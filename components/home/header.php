<!DOCTYPE html>
<html lang="en">

<body>
    <div id="header"></div>


    <script type="text/babel">

        class Header extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    imageInd: 0,
                    totalImages: 6,
                };
            }
            componentDidMount = () => {
                //automatically change image every 5 seconds
                const interval = setInterval(() => {
                    // this.imageInd = this.imageInd === this.totalImages - 1 ? 1 : this.imageInd + 1
                    this.setState({
                        imageInd: this.state.imageInd === this.state.totalImages - 1 ? 1 : this.state.imageInd + 1
                    })
                    this.render()
                }, 20000)
                return () => clearInterval(interval)
            }
            router = {
                route: '/',
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }
            bgs = [
                'assets/images/backup/masjid.JPG',
                'assets/images/backup/library.JPG',
                'assets/images/backup/campus.JPG',
                'assets/images/backup/gym.JPG',
                'assets/images/backup/lab.JPG',
                'assets/images/backup/play.JPG',
            ]
            s = {}

            // componentDidMount() {
            //     alert('hello');
            // }
            quickLinks = [
                {
                    name: 'Home',
                    link: '/',
                },
                {
                    name: 'About',
                    link: '/about',
                },
                {
                    name: 'News & Events',
                    link: '/events',
                },
                {
                    name: 'Gallery',
                    link: '/photo_gallery',
                },
                {
                    name: 'Admission',
                    link: '/admission',
                },
                {
                    name: 'Contact us',
                    link: '/contact',
                },
            ];

            render() {
                return (
                    <div className='header'>
                        <div className='colorOverlay'>
                            <div className='texts' >
                                <img src="../../assets/logo white.png" alt="zaitoon campus white logo png"/>
                                <p className="h1">HERE <span>LIGHT</span> <br /> IS EXTRA <span>BRIGHT</span> </p>
                                <a class="btn_apply" href="/admission">APPLY NOW</a>
                                
                                {/* learn more button with arrow and hover effect */}
                                <div 
                                    style={{
                                        display: 'flex',
                                        gap: '1rem',
                                    }}>


                                </div>

                            {                                
                                // <div className='quick_notification'>
                                //   2023-24 Admission started... <br/> 
                                //   <a href="https://forms.gle/utgEHQoMFJYQVesZA"><button>Apply Now</button></a>
                                // </div>
                            }
                            </div>
                            <div className='social_media'>
                                <a href="https://www.facebook.com/zaitooncampus" target="_blank">
                                    {/* <FacebookRounded />  */}
                                </a>
                                <a href="https://www.instagram.com/zaitooncampus/" target="_blank">
                                    {/* <Instagram /> */}
                                </a>
                                <a href="https://wa.me/917510228882" target="_blank">
                                    {/* <WhatsApp />  */}
                                </a>
                                <a href="tel:+917510228882" target="_blank">
                                    {/* <CallRounded /> */}
                                </a>
                                <a href="tel:+917510228881" target="_blank">
                                    {/* <CallRounded /> */}
                                </a>

                            </div>
                            <div className='imgDiv' style={{ backgroundImage: `url(${this.bgs[this.state.imageInd]})` }}>

                            </div>
                        </div>
                    </div>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('header'))
        root.render(<Header />)
    </script>
</body>

</html>