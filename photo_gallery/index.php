<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <link rel="stylesheet" href="../styles/gallery.css?version=2">
    <link rel="stylesheet" href="../styles/gallery_layout.css?version=2">
    <title>Zaitoon Campus | Photo gallery</title>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="gallery"></div>
    <?php include '../components/footer.php'; ?>


    <script type="text/babel">
        class Photo_gallery extends React.Component {
            constructor(props) {
                super(props);
                this.state = { activePhotoInd: null, photos: [] };
            }
            setActivePhotoInd = (index) => {
                this.setState({ activePhotoInd: index });
            }
            setPhotos = (photos) => {
                this.setState({ photos: photos });
            }
            componentDidMount() {
                getAllData('photo_gallery').then((querySnapShot) => {
                const data = querySnapShot.docs.map((doc) => {
                    return { ...doc.data(), id: doc.id };

                }
                );
                //console.log(data)
                this.setPhotos(data.reverse());
            })
            }
            photos = [
                {
                    image: 'https://images.unsplash.com/photo-1612528443702-f6741f70a049?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2080&q=80',
                    alt: '2',
                    description: 'Here is the description',
                },
                {
                    image: 'http://www.zaitooncampus.com/images/bnr10.jpg',
                    alt: '3',
                    description: 'Here is the description',
                },
                {
                    image: 'http://www.zaitooncampus.com/images/bnr9.jpg',
                    alt: '4',
                    description: 'Here is the description',

                },
                {
                    image: 'http://www.zaitooncampus.com/images/bnr11.jpg',
                    alt: '5',
                    description: 'Here is the description',
                },
                {
                    image: 'http://www.zaitooncampus.com/images/fec/1.jpg',
                    alt: '6',
                    description: 'Here is the description',
                },
                {
                    image: 'http://www.zaitooncampus.com/images/fec/3.jpg',
                    alt: '7',
                    description: 'Here is the description',
                },
                {
                    image: 'https://plus.unsplash.com/premium_photo-1674499074525-07ce14caca74?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=988&q=80',
                    alt: '7',
                    description: 'Here is the description',
                },
                {
                    //sample photo from unsplash
                    image: 'https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80',
                    alt: '1',
                    description: 'Here is the description',
                },
                {
                    image: 'https://images.unsplash.com/photo-1612528443702-f6741f70a049?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2080&q=80',
                    alt: '2',
                    description: 'Here is the description',
                },

                {
                    image: 'https://plus.unsplash.com/premium_photo-1674499074525-07ce14caca74?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=988&q=80',
                    alt: '7',
                    description: 'Here is the description',
                },

            ];

            render() {
                return (
                    <div className='total'>
                        <div className='container'>

                            <div className='gallery'>
                                {this.state.photos.map((photo, index) => (

                                    <div className={`photo ${this.state.activePhotoInd === index ? 'isActive' : ''}`}
                                        onClick={() => this.state.activePhotoInd !== index ? this.setActivePhotoInd(index) : this.setActivePhotoInd(null)}
                                        key={index}
                                        style={{
                                            backgroundImage: `url(${photo.image})`,
                                        }}>
                                        {
                                            this.state.activePhotoInd === index && !photo.isVideo && (
                                                <div className='photoInfo'>
                                                    <h3>{photo.description}</h3>
                                                    
                                                    <a target='_BLANK' href={photo.image}><i class="fa-solid fa-file-arrow-down"></i>  </a>
                                                </div>
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
                                <Photo_gallery />
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