<!DOCTYPE html>
<html lang="en">

<body>
    <div id="courses"></div>

    <script type="text/babel">

        class Courses extends React.Component {
            router = {
                route: '/',
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }
            bgs = [
                'url(../../assets/images/campus.webp)',
                'url(../../assets/images/play.webp)',
                'url(../../assets/images/gym.webp)',
                'url(../../assets/images/library.webp)',
                'url(../../assets/images/lab.webp)',
                'url(../../assets/images/masjid.webp)',
            ]

            data = [
                {
                    title: 'Zaitoon Higher Secondary',
                    desc: 'It provides coaching services for NEET/JEE, MED/ENGG entrance, CA/CMA foundation, Civil Service foundation, and CUET coaching and entrance for premier institutes like JMI, TISS, APU, DU, HCU, EFLU, etc. The faculty members are well experienced trainers from professional coaching centers, research scholars from national universities.',
                    url: '/higher-secondary',
                    image: this.bgs[0],
                },
                {
                    title: 'Zaitoon Entrance Academy',
                    desc: "The academy offers one year's course that prepares the students (repeaters) for the National Eligibility cum Entrance Test (NEET) and Joint Entrance Examination (JEE). To ensure that every student achieves their full academic pretension, Zaitoon has designed the course with the distinguishing features.",
                    url: 'entrance-academy',
                    image: this.bgs[1],
                },
                {
                    title: 'Zaitoon Graduate Academy',
                    desc: 'Zaitoon International Campus offers both B.Com and BA in English. B.Com is a 3-year undergraduate degree in Commerce. The minimum eligibility for this course is to pass the Higher Secondary Examination with Maths and English as core subjects.',
                    url: 'graduate-academy',
                    image: this.bgs[3],
                },
                // {
                //   title: 'Zaitoon Beacon',
                //   desc: 'It is an autogenic training programme meant for students who have been in search of an ultimate solution to rid themselves of unfounded fear, beat short memory, sharpen their concentration and after all realise the true power of their mind.',
                //   url: '#',
                //   image: this.bgs[0],
                // },
                // {
                //     title: 'Zaitoon Commerce Academy',
                //     desc: 'Zaitoon has been the first to launch a girls-only residential commerce academy which offers the much awaited blend of professional coaching (foundation) in CA and CMA (India) with moral studies.',
                //     url: 'commerce-academy',
                //     image: this.bgs[1],
                // },
                // {
                //     title: 'Zaitoon Civil Services Academy',
                //     desc: 'Zaitoon Academy for Civil Service offers intensive civil service coaching for boys and girls. The academy has renowned faculty, hand-picked from Delhi/Hyderabad/Thiruvananthapuram. The materials are meticulously designed by Zaitoon’s academic wing.',
                //     url: 'civil-services-academy',
                //     image: this.bgs[2],
                // },
                {
                    title: 'Zaitoon Junior Program',
                    desc: 'Zaitoon Junior Program (ZJP) is an integrated residential high-schooling program with value education focusing on budding professionals. ZJP aims to nurture young minds to develop a sublime character, become creative & critical thinkers, aware people, lifelong learners, and believers in positive actions and behaviour and excel in their respective professional areas.',
                    url: 'junior-program',
                    image: this.bgs[3],
                },
                // {
                //     title: 'Zaitoon Junior Program',
                //     desc: 'Zaitoon Junior Program (ZJP) is an integrated residential high-schooling program with value education focusing on budding professionals. ZJP aims to nurture young minds to develop a sublime character, become creative & critical thinkers, aware people, lifelong learners, and believers in positive actions and behaviour and excel in their respective professional areas.',
                //     url: 'junior-program',
                //     image: this.bgs[3],
                // },
            ]
            render() {
                return (
                    <section className='courses' id="courses" >
                        
                        <div className='container' >
                            <h1 data-aos="fade-zoom-in">We provide potential courses</h1>
                            <ul >

                                {
                                    this.data.map((item, index) => (

                                        <li className='course' key={index}
                                            onClick={(() => this.router.push(item.url))}
                                            data-aos="fade-zoom-in"

                                        >
                                            {/* <div className='imgDiv' style={{ backgroundImage: item.image }}></div> */}
                                            <div className='texts'>
                                                <h1>{item.title}
                                                    <hr />
                                                </h1>
                                                <p>{item.desc}</p>
                                            </div>
                                            <div className='learn_more'>
                                                Learn More
                                                {/* <East className='arrow' /> */}
                                            </div>
                                        </li>

                                    ))
                                }
                                <li style={{visibility:'hidden'}}></li>
                            </ul>

                        </div>
                    </section>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('courses'))
        root.render(<Courses />)
    </script>
</body>

</html>