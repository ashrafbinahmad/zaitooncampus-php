<html lang="en">

<body>
    <section id="campuses"></section>
    <script type="text/babel">
        const data = [
            {
                heading: `Zaitoon Girls' Campus`,
                link: `/about_zaitoon_girls_campus`,
                icon: "/assets/svgs/girl.svg",
                icon_onHover: '/assets/svgs/girl_hover.svg',
                gender: 'female'
            },
            {
                heading: `Zaitoon Boys' Campus`,
                link: `/about_zaitoon_boys_campus`,
                icon: '/assets/svgs/boy.svg',
                icon_onHover: '/assets/svgs/boy_hover.svg',
                gender: 'male'
            },
        ]
        class Campuses extends React.Component {
            router = {
                route: window.location.pathname,
                push: (route) => {
                    window.location = route
                }
            }

            data = [

            ]
            render() {
                return (
                    <>
                        <div class="container">
                            {
                                data.map((item, ind) => (
                                    <div class="campus_item" key={ind}
                                        onClick={() => this.router.push(item.link)}
                                    >
                                        <div class="left">
                                            <div class={`icon ${item.gender}`} ></div>
                                        </div>



                                        <div class="right">
                                            <h2>{item.heading}</h2>
                                        </div>

                                    </div>
                                ))
                            }

                        </div >
                        {//<div class="line"></div>
                        }
                    </>

                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('campuses'))
        root.render(<Campuses />)
    </script>
</body>

</html>