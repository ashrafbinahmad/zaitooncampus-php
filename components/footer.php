<!DOCTYPE html>
<html lang="en">

<body>
    <div id="footer"></div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-in-out',
            duration: 1000
        });
    </script>


    <script type="text/babel">

        class Footer extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    campusCourses: [],
                    boysCourses: [],
                    girlsCourses: [],
                }
            }

            setCampusCourses = (data) => {
                this.setState({ campusCourses: data })
            }

            setGirlsCourses = (data) => {
                this.setState({ girlsCourses: data })
            }

            setBoysCourses = (data) => {
                this.setState({ boysCourses: data })
            }

            loadData() {
                getAllData('courses').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );


                    let boysCourses = data.filter(item => item.campus == "Boys")
                    console.log(boysCourses)
                    boysCourses = boysCourses.map(item => {
                        return { name: item.courseName, link: "/boys-campus?course=" + item.url.toLowerCase() }
                    })
                    this.setBoysCourses(boysCourses)
                    let girlsCourses = data.filter(item => item.campus == "Girls")
                    girlsCourses = girlsCourses.map(item => {
                        return { name: item.courseName, link: "/girls-campus?course=" + item.url.toLowerCase() }
                    })
                    this.setGirlsCourses(girlsCourses)
                    console.log(girlsCourses)

                })
            }


            componentDidMount() {
                this.loadData()
            }
            render() {

                const router = {
                    route: window.location.pathname,
                    push: (route) => {
                        window.location = route
                    }
                }
                const s = {}
                const quickLinks = [
                    {
                        name: 'Home',
                        link: '/',
                    },
                    {
                        name: 'ZIGC, Kottakkal',
                        link: '/zigs_kottakkal',
                    },
                    {
                        name: 'ZIGC, Payyannur',
                        link: '/zigs_payyannur',
                    },
                    {
                        name: 'ZIBC, Pattambi',
                        link: '/zibs_pattambi',
                    },
                    {
                        name: 'News and events',
                        link: '/events',
                    },
                    {
                        name: 'Photo gallery',
                        link: '/photo_gallery',
                    },
                    {
                        name: 'Video gallery',
                        link: '/video_gallery',
                    },
                    {
                        name: 'Contact us',
                        link: '/contact',
                    },
                ];
                const courses = [...this.state.boysCourses, ...this.state.girlsCourses]

                return (
                    <>
                        <footer className='total' id='footer' data-aos="none">
                            <i></i>
                            <div class="footer_tagline">
                                <p> Welcome to Zaitoon International Campus, the best residential school in Kerala with medical (NEET) and engineering (JEE) entrance coaching with Islamic studies.</p>
                            </div>
                            <div className='container'>
                                <div className='logo_area'>
                                    <img src="/assets/logo.png" alt="logo" />
                                    <h1>ZAITOON</h1>
                                    <h3>
                                        International Campus
                                    </h3>
                                    <p>
                                        Zaitoon International Campus (ZIC) is an educational centre under
                                        Zaitoon Foundation.
                                    </p>
                                </div>
                                {// <div className='address_area'>

                                //     <p>
                                //         <br />
                                //         Zaitoon International Boys Campus, Kaipuram, Pattambi <br />
                                //         Malappuram, Kerala, India <br />

                                //     </p>
                                //     <hr style={{ borderWidth: '1px', borderColor: '#ffffff1a' }} />
                                //     <p>
                                //         Zaitoon Girls Campus <br />
                                //         Kottakkal, Pang Chendi <br />
                                //         Malappuram, Kerala, India <br />

                                //     </p>
                                //     <br />


                                // </div>
                                }
                                <div className='quick_links'>

                                    <ul>
                                        {quickLinks.map((link, index) => (
                                            <li key={index}>
                                                <a href={link.link}>{link.name}</a>
                                                <hr />
                                            </li>
                                        ))}
                                    </ul>
                                    {// <ul>
                                        //     <li style={{ fontWeight: 'bold', }}>Zaitoon Boys Campus</li>

                                        //     {this.state.boysCourses.map((link, index) => (
                                        //         <li key={index}>
                                        //             <a href={link.link}>{link.name}</a>
                                        //             <hr />
                                        //         </li>
                                        //     ))}
                                        //     <li style={{ fontWeight: 'bold', }}>Zaitoon Girls Campus</li>

                                        //     {this.state.girlsCourses.map((link, index) => (
                                        //         <li key={index}>
                                        //             <a href={link.link}>{link.name}</a>
                                        //             <hr />
                                        //         </li>
                                        //     ))}
                                        // </ul>
                                    }
                                </div>
                                <div className='contact'>
                                    <div className='phone_numbers'>
                                        <h5>+91 7510 22 8881</h5>
                                        <h5>+91 7510 22 8882</h5>
                                    </div>
                                    <div className='social_media'>

                                        <a href="https://www.facebook.com/zaitooncampus" target="_blank">
                                            {/* <FacebookRounded />  */}
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://www.instagram.com/zaitooncampus/" target="_blank">
                                            {/* <Instagram />  */}
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="https://wa.me/917510228881" target="_blank">
                                            {/* <WhatsApp />  */}
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a href="tel:+917510228882" target="_blank">
                                            {/* <CallRounded />  */}
                                            <i class="fas fa-phone"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </footer>
                        <div id='wh-floating'
                            onClick={() => {
                                window.open('https://api.whatsapp.com/send?phone=917510228882&text=Hi', '_blank')
                            }}
                        >
                            <p>Message us </p>
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                    </>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('footer'))
        root.render(<Footer />)
    </script>
</body>

</html>