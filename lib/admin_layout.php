<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../lib/admin_head.php'; ?>
    <!-- <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-auth.js"></script> -->


</head>

<body>
    <div id="layout"></div>
    <script type="module">

    </script>


    <script type="text/babel">



        class Overview extends React.Component {


            router = {
                route: window.location.pathname,
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }


            menuItems = [
                {
                    name: 'Counts',
                    link: '/admin/counts/',
                },
                {
                    name: 'News and Events',
                    link: '/admin/news_events/',
                },
                {
                    name: 'Photo gallery',
                    link: '/admin/photo_gallery/',
                },
                {
                    name: 'Video gallery',
                    link: '/admin/video_gallery/',
                },
                {
                    name: 'Courses',
                    link: '/admin/courses/',
                },
            ]
            componentDidMount() {
                clientApp()

                const auth = firebase.auth()
                auth.onAuthStateChanged((user) => {
                    if (!ADMIN_EMAILS.includes(user?.email)) {
                        window.location = '/admin/auth/'

                    }
                })
            }


            render() {
                const s = {}

                return (
                    <div className='total'>
                        {/* <ToastContainer
                            theme='colored'
                            position='bottom-right'
                            hideProgressBar={false}
                            autoClose={1000}
                        /> */}
                        <nav className='nav'>

                            <h1 className='py-1'>Zaitoon Admin Panel</h1>
                            <button className='logout' onClick={() => {
                                const auth = firebase.auth()
                                auth.signOut()
                                window.location = '/admin/auth/'

                            }}>
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                            </button>
                            <ul className='menu'>
                                {this.menuItems.map((item, index) => (
                                    <li key={index}
                                        className={item.link === this.router.route ? 'active' : ''}
                                        onClick={() => {
                                            this.router.push(item.link);
                                        }}


                                    >
                                        <p>{item.name}</p>
                                    </li>
                                ))}


                            </ul>
                        </nav>

                    </div>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('layout'))
        root.render(<Overview />)
    </script>
</body>

</html>