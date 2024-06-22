<!DOCTYPE html>
<html lang="en">

<body>
    <div id="courses"></div>

    <script type="text/babel">

        class CampusCoursesTemplate extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    campusCourses: [],
                }
            }
            setCampusCourses = (data) => {
                this.setState({ campusCourses: data })
            }
            router = {
                route: '/',
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }
            loadData() {
                getAllData('courses').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );


                    const campusCourses = data.filter(item => item.campus == this.props.campusType)

                    this.setCampusCourses(campusCourses)

                })
            }
            componentDidMount() {
                this.loadData()
            }
            render() {
                return (
                    <>
                        <h3 style={{ textAlign: "center", padding: '.2rem', color: '#03380c', margin: 'auto', width: 'fit-content', opacity: '.5', textTransform: 'uppercase', fontSize: '18px', fontWeight: '600' }}>{this.props.campusType} Campus</h3>
                        <ul >

                            {
                                this.state.campusCourses.map((item, index) => (

                                    <li className='course' key={index}
                                        onClick={(() => this.router.push(`/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`))}
                                        data-aos="fade-zoom-in"
                                    >
                                        {/* <div className='imgDiv' style={{ backgroundImage: item.image }}></div> */}
                                        <div className='texts'>
                                            <h1>{item.courseName}
                                                <hr />
                                            </h1>
                                            <p>{item.content.slice(0, 200)}...</p>
                                        </div>
                                        <div className='learn_more'>
                                            Learn More
                                            {/* <East className='arrow' /> */}
                                        </div>
                                    </li>

                                ))
                            }
                            {
                                <li style={{ visibility: 'hidden' }}></li>
                            }
                        </ul>
                        <br />
                        <br />
                    </>

                );
            }
        }

        const GirlsAndBoysCourses = <>
            <section className='courses' id="courses" >

                <div className='container' >
                    <h1 data-aos="fade-zoom-in">We provide potential courses</h1>
                    <br />
                    <CampusCoursesTemplate campusType="Boys" />
                    <CampusCoursesTemplate campusType="Girls" />
                </div>
            </section >
        </>




        const root = ReactDOM.createRoot(document.getElementById('courses'))
        root.render(GirlsAndBoysCourses)
    </script>
</body>

</html>