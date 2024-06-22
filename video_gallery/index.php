<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <link rel="stylesheet" href="../styles/gallery.css?version=2">
    <link rel="stylesheet" href="../styles/gallery_layout.css?version=2">
    <title>Zaitoon Campus | Video gallery</title>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="gallery"></div>
    <?php include '../components/footer.php'; ?>


    <script type="text/babel">
        class Video_gallery extends React.Component {
            constructor(props) {
                super(props);
                this.state = { activeVideoInd: null, videos: [] };
            }
            setVideos = (videos) => {
                this.setState({ videos: videos });
            }
            componentDidMount() {
                getAllData('video_gallery').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );
                    //console.log(data)
                    this.setVideos(data.reverse());
                })
            }
            setActiveVideoInd = (index) => {
                this.setState({ activeVideoInd: index });
            }
            videos = [
                {
                    embedId: 'Z1ktxiqyiLA',
                    description: 'Here is the description',
                },
                {
                    embedId: 'Z1ktxiqyiLA',
                    description: 'Here is the description',
                },
                {
                    embedId: 'Z1ktxiqyiLA',
                    description: 'Here is the description',
                },
                {
                    embedId: 'Z1ktxiqyiLA',
                    description: 'Here is the description',
                },
                {
                    embedId: 'Z1ktxiqyiLA',
                    description: 'Here is the description',
                },


            ];

            render() {
                return (
                    <div className='total'>
                        <div className='container'>
                            {/* <div className='line'></div>
                    <h1>Gallery <hr /></h1> */}
                            <div className='gallery'>
                                {this.state.videos.map((video, index) => (

                                    <div className={`photo ${this.state.activeVideoInd === index ? 'isActive' : ''}`}
                                        onClick={() => this.state.activeVideoInd !== index ? this.setActiveVideoInd(index) : this.setActiveVideoInd(null)}
                                        key={index}
                                        style={{ backgroundImage: this.state.activeVideoInd === index || `url(https://img.youtube.com/vi/${video.embedId}/0.jpg)` }}
                                    >
                                    <i class="fa-sharp fa-regular fa-circle-play" style={{margin: ".5rem"}}></i>

                                        {
                                            this.state.activeVideoInd === index && !video.isVideo && (
                                                <>
                                                    {/* <Close /> */}
                                                    <iframe
                                                        className='videoIframe'
                                                        width="853"
                                                        height="480"
                                                        src={`https://www.youtube.com/embed/${video.embedId}`}
                                                        frameBorder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowFullScreen
                                                        title="Embedded youtube"
                                                        style={{ height: '80%', width: '80%' }}
                                                    />
                                                </>

                                            )
                                        }

                                    </div>
                                )
                                )}


                            </div>
                        </div>
                    </div>
                )
            }

        }

        class GalleryWithLayout extends React.Component {
            router = {
                route: window.location.pathname,
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }
            render() {
                return (
                    <div className='gallery'>
                        <div className='container'>

                            <div className='nav'>
                                <span className={this.router.route == "/photo_gallery/" ? 'isActive' : ''} onClick={() => { this.router.push('/photo_gallery') }}>Photos</span>
                                <span className={this.router.route == "/video_gallery/" ? 'isActive' : ''} onClick={() => { this.router.push('/video_gallery') }}>Videos</span>
                            </div>
                            <div id='photo_gallery'>
                                <Video_gallery />
                            </div>
                        </div>
                    </div>

                )
            }
        }
        const root = ReactDOM.createRoot(document.getElementById('gallery'))
        root.render(<GalleryWithLayout />)
    </script>
</body>

</html>