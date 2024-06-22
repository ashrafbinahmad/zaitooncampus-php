<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>

    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <link rel="stylesheet" href="./styles/global.css?version=3">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    </link>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin />
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&
        family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    </link>

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>

    <link rel="stylesheet" href="../styles/global.css?version=3">
    <link rel="stylesheet" href="../styles/footer.css?version=2">
    <link rel="stylesheet" href="../styles/navbar.css?version=3">
    <script>
        AOS.init({
            easing: 'ease-in-out',
            duration: 1000
        });
    </script>
</head>

<body>
    <nav id="nav" class="navbar"></nav>


    <script type="text/babel">
        class Nav extends React.Component {
            constructor(props) {
                super(props);
                this.state = {
                    isOpen: false,
                    openedSubMenu: null,
                    headedCourses: []
                }
            }
            setIsOpen = (isOpen) => {
                this.setState({ isOpen })
            }
            setOpenedSubMenu = (openedSubMenu) => {
                this.setState({ openedSubMenu })
            }
            setHeadedCourses = (headedCourses) => {
                this.setState({ headedCourses })
            }
            router = {
                route: window.location.pathname,
                push: (route) => {
                    window.location = route
                }
            }

            checkIsSubMenuItemActive = (menuItem) => {
                return menuItem?.subMenuItems?.some(subMenuItem => this.router.route == subMenuItem.link)
            }
            s = {}
            componentDidMount() {
                getAllData('courses').then((querySnapShot) => {
                    const data = querySnapShot.docs.map((doc) => {
                        return { ...doc.data(), id: doc.id };

                    }
                    );


                    const boysCourses = data.filter(item => item.campus == "Boys")
                    const girlsCourses = data.filter(item => item.campus == "Girls")

                    const menuData = [
                        {
                            heading: 'ZIGC, Pang',
                            items: boysCourses.map(item => {
                                return {
                                    name: item.courseName,
                                    link: `/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`
                                }
                            })
                        },
                        {
                            heading: 'ZIBC, Kaipuram',
                            items: girlsCourses.map(item => {
                                return {
                                    name: item.courseName,
                                    link: `/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`
                                }
                            })
                        },
                        {
                            heading: 'ZIGC, Chemmeni',
                            items: girlsCourses.map(item => {
                                return {
                                    name: item.courseName,
                                    link: `/${item.campus.toLowerCase()}-campus/?course=${item.url.toLowerCase()}`
                                }
                            })
                        },
                    ]
                    this.setHeadedCourses(menuData)

                })
            }
            render() {
                const menuItems = [
                    { name: 'HOME', link: '/' },
                    {
                        name: 'INSTITUTES',
                        showSubMenu: true,

                        subMenuItems: [
                            { name: "ZIGC, Kottakkal", link: '/zigs_kottakkal/' },
                            { name: "ZIBC, Pattambi", link: '/zibs_pattambi/' },
                            { name: "ZIGC, Payyannur", link: '/zigs_payyannur/' },
                        ]
                    },
                    // { name: 'ACHIEVEMENTS', link: '/achievements/' },

                    {
                        name: 'NEWS',
                        showSubMenu: true,
                        // link: 'null',
                        subMenuItems: [
                            { name: 'News and events', link: '/events/' },
                            { name: 'Photo gallery', link: '/photo_gallery/' },
                            { name: 'Video gallery', link: '/video_gallery/' },
                        ]
                    },
                    { name: 'ADMISSION', link: '/admission/' },
                    { name: 'CONTACT US', link: '/contact/' },
                ]

                return (
                    <>


                        <div className='container'>
                            <a href="/">
                                <div className='left'>

                                    <div className='s_logo'>
                                        <img className='s_logoImg' src="../assets/logo.png" alt="logo" />
                                    </div>
                                    <div className='titles'>
                                        <h1>ZAITOON</h1>
                                        <div className='title2'>
                                            <h2>{`INTERNATIONAL \n CAMPUS`}</h2>
                                        </div>
                                    </div>


                                </div>
                            </a>
                            <div className='logo'>
                                <a href="/">

                                    <img className='logoImg' src="/assets/zaitoonNavLogo.png" alt="logo" />
                                </a>
                            </div>

                            <div className={`menu ${this.state.isOpen ? 'isOpen' : ''}`}>
                                <div className='btnBack'>
                                </div>
                                <ul>
                                    <div className='btnClose'
                                        onClick={() => this.setIsOpen(!this.state.isOpen)}
                                    >
                                        <i class="fa-solid fa-xmark" style={{ fontSize: '1.2rem' }}></i>
                                    </div>
                                    {
                                        menuItems.map((item, index) => (
                                            <li className={`menuItem ${this.router.route == item.link || this.checkIsSubMenuItemActive(item) ? 'active' : ''}`} key={index}
                                                onClick={
                                                    () => item.link ? this.router.push(item.link)
                                                        :
                                                        this.setOpenedSubMenu(this.state.openedSubMenu != item.name ? item.name : null)

                                                    // this.setOpenedSubMenu(name => name != item.name ? item.name : null)
                                                }
                                            >
                                                <p>{item.name} {item.subMenuItems && item.showSubMenu ? <i class="fa-solid fa-chevron-down fa-2xs"></i> : ''}</p>
                                                <div className='itemLine'></div>

                                                {
                                                    !item.headedSubMenuItems && item.subMenuItems && item.showSubMenu && (
                                                        <ul className={`subMenu ${this.state.openedSubMenu === item.name ? 'isOpen' : ''}`}>
                                                            {
                                                                item.subMenuItems.map((subItem, index) => (
                                                                    <li className={`subMenuItem ${this.router.route == subItem.link ? 'active' : ''}`} key={index}
                                                                        onClick={() => this.router.push(subItem.link)}>
                                                                        {subItem.name}
                                                                    </li>
                                                                ))
                                                            }
                                                        </ul>
                                                    )
                                                }
                                                {
                                                    item.headedSubMenuItems && item.showSubMenu && (
                                                        <ul className={`subMenu ${this.state.openedSubMenu === item.name ? 'isOpen' : ''}`}>
                                                            {
                                                                this.state.headedCourses?.map((headedItem, index) => (
                                                                    <>
                                                                        <li style={{ fontWeight: 'bold', backgroundColor: 'var(--primary-color)', color: 'white', opacity: '.8', padding: '3px 1rem' }}>{headedItem?.heading}</li>
                                                                        {
                                                                            headedItem?.items?.map((subItem, index) => (
                                                                                <li className={`subMenuItem ${this.router.route == subItem.link ? 'active' : ''}`} key={index}
                                                                                    onClick={() => this.router.push(subItem.link)}>
                                                                                    {subItem.name}
                                                                                </li>
                                                                            ))
                                                                        }
                                                                        <div style={{ height: "1rem" }}></div>
                                                                    </>



                                                                ))
                                                            }
                                                        </ul>
                                                    )
                                                }
                                            </li>
                                        ))
                                    }
                                    <a class="btn_apply" href="/admission">APPLY NOW</a>
                                </ul>
                            </div>
                            <div className='hamburger'
                                onClick={() => this.setIsOpen(!this.state.isOpen)}
                            >
                                <div className={`hamburgerLine a`}></div>
                                <div className={`hamburgerLine b`}></div>
                                <div className={`hamburgerLine c`}></div>
                            </div>
                        </div >

                    </>
                )
            }
        }
        const root = ReactDOM.createRoot(document.getElementById('nav'))
        root.render(<Nav />)
    </script>
</body>

</html>