<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <title>Zaitoon Campus | News and events</title>





    <link rel="stylesheet" href="../styles/events.css?version=2">

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="events"></div>
    <?php include '../components/footer.php'; ?>

    <script type="text/babel">
        class Events extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    fetchedData: [],
                }
            }
            componentDidMount() {
                getAllData('news_and_events').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );

                    this.setState({ fetchedData: data.reverse() });
                    //console.log(this.state.fetchedData);
                    console.log(data);
                })
            }
            bgs = [
                '../assets/images/campus.webp',
                '../assets/images/play.webp',
                '../assets/images/gym.webp',
                '../assets/images/library.webp',
                '../assets/images/lab.webp',
                '../assets/images/masjid.webp',
            ]
            data = [
                {
                    headline: 'Sports Day Celebrated',
                    date: '12th May 2021',
                    content: 'Under the auspicious of sports club, Chess Competition is scheduled on next Monday.',
                    url: '#',
                    image: this.bgs[0],
                },
                {
                    headline: 'Chess competition',
                    date: '12th May 2021',
                    content: 'Under the auspicious of sports club, Chess Competition is scheduled on next Monday.',
                    url: '#',
                    image: this.bgs[1],
                },
                {
                    headline: 'Seminar on Importance of Health',
                    date: '12th May 2021',
                    content: 'The science club has been decided to conduct an open seminar on "Importance of Maintaining Health in modern era".',
                    url: '#',
                    image: this.bgs[2],
                },
                {
                    headline: 'Laboratory Tour',
                    date: '12th May 2021',
                    content: 'The inauguration of renovated Laboratory will be held on 2nd of next month at school auditorium.',
                    url: '#',
                    image: this.bgs[3],
                },
            ]
            render() {
                return (
                    <div className='container' >
                        <h1>News and events</h1>
                        <div className='news_container'>
                            {
                                this.state.fetchedData.map((item, index) => {
                                    return (
                                        <>
                                            <div key={index} className='card' id={item.id}>
                                                <div className='left'>

                                                    <img src={item.image} alt={item.headline} />
                                                </div>
                                                <div className='right'>

                                                    <h2>{item.headline}</h2>
                                                    <h4>{item.date}</h4>
                                                    <p>{item.content}</p>
                                                </div>
                                                
                                                
                                                </div>
                                                <hr style={{borderBottomColor:'gray',opacity:'0.3'}} />
                                            {/* <div className='thickLine' > </div> */}
                                        </>
                                    )
                                })

                            }

                        </div>
                    </div>
                )
            }

        }
        const root = ReactDOM.createRoot(document.getElementById('events'))
        root.render(<Events />)
    </script>
</body>

</html>