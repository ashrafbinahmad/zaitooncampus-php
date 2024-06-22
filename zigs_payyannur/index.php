<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <meta name="description" content="Zaitoon International Boys Campus- Kaipuram, Palakkad">
    <title>Zaitoon Girls Campus, Payyannur</title>

    <link rel="stylesheet" href="../styles/about.css?version=3">
</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="about"></div>
    <?php include '../components/footer.php'; ?>

    <script type="text/babel">
        class About extends React.Component {
            router = {
                route: window.location.pathname,
                push: (route) => {
                    // router.route = route
                    // render()
                    window.location = route
                }
            }
            courses = [
                {
                    name: "Zaitoon International Girls Campus: Higher Secondary",
                    link: "",
                    image: "/assets/images/library.webp"
                },
                {
                    name: "Zaitoon Junior Program (ZJP): Grade 8-10, CBSE / NCERT",
                    link: "/girls-campus/?course=zaitoon-junior-program--zjp--grade-8-to-10---cbse",
                    image: "https://t3.ftcdn.net/jpg/02/74/76/34/360_F_274763459_HADMcYrskkrAPtBDWqv4RHXz9QXjPoLX.jpg"
                },
                {
                    name: "Zaitoon School of Excellence: Grade 1-7, CBSE / NCERT",
                    link: "/girls-campus/?course=school-of-excellence--cbse-grade-1-7",
                    image: "https://images.pexels.com/videos/5182682/pexels-photo-5182682.jpeg?auto=compress&cs=tinysrgb&h=627&fit=crop&w=1200",
                },
                {
                    name: "Zaitoon House of Children: KG",
                    link: "/girls-campus/?course=zaitoon-house-of-children--kg-and-pre-kg-",
                    image: "https://cdn-cms.orchidsinternationalschool.com/blog/Right-age-for-LKG-Admissionskiprclh.png",
                },

            ]
            features = [
                {
                    title: 'Dedicated study halls',
                    icon: <img src='../assets/svgs/study.svg' className='icon' />,
                },
                {
                    title: 'Well resourced library',
                    icon: <img src='../assets/svgs/library.svg' className='icon' />,
                },
                {
                    title: 'Air conditioned classrooms',
                    icon: <img src='../assets/svgs/ac.svg' className='icon' />,
                },
                {
                    title: 'Science laboratory',
                    icon: <img src='../assets/svgs/lab.svg' className='icon' />,
                },
                {
                    title: 'Cafeteria',
                    icon: <img src='../assets/svgs/cafeteria.svg' className='icon' />,
                },
                {
                    title: 'Supermarket',
                    icon: <img src='../assets/svgs/supermarket.svg' className='icon' />,
                },
                {
                    title: 'Internet resource access',
                    icon: <img src='../assets/svgs/online.svg' className='icon' />,
                },
                {
                    title: 'Reading room',
                    icon: <img src='../assets/svgs/reading.svg' className='icon' />,
                },
            ];

            visions = [
                "Selecting and nurturing young capable students to be successful in high impact educational streams",
                "Facilitating quality, personalised and mastery-based intensive Instructional System Design",
                "Inculcating value systems derived from Islamic Teachings and the Constitution of India",
                "Providing the local, national and global exposure and life skills needed to shape their personal and professional life",
                "Demonstrating consistent achievements at the highest levels through ensuring seats in the Institutes of National Importance (INI) in India & well renowned universities abroad",
                "Partnering the Zaitoon Family in the journey ahead in the form of students, teachers, parents, alumni and well-wishers",
                "Establishing an ambassadorship-oriented learner-chain base, which is founded on the vision and objectives of the Zaitoon Foundation",
            ]
            render() {
                return (
                    <main className='total'>
                        <section className='intro'>

                            <div className='container'>
                                <br />
                                <br />
                                <br />
                                {/* <div className='line'></div> */}
                                <h1>
                                    Zaitoon Girls Campus- Payyannur <br />

                                </h1>
                                <h2>ABOUT US</h2>
                                <p className='about_desc'>
                                    Step into Zaitoon International Girls Campus at Cheemeni, Payyannur, where education and
                                    morality converge to shape the future of young women. As an exclusive residential school for
                                    girls, our campus is a haven for academic and character development. With a focus on NEET
                                    and JEE coaching, we go beyond conventional education by integrating the principles of
                                    Islamic studies, providing a unique and enriching experience.
                                    <br />
                                    <br />
                                    <br />
                                    Zaitoon International Girls Campus at Cheemeni stands as a beacon of empowerment,
                                    nurturing students to become confident individuals ready to conquer academic challenges and
                                    navigate life with ethical clarity. Join us in this transformative educational journey, where the
                                    pursuit of knowledge and the embrace of moral values create a holistic foundation for
                                    success.
                                    <br />
                                    <br />

                                </p>
                                <div className='btns'>
                                    <div className='btn_rounded'
                                        onClick={() => this.router.push('/contact/')}

                                    >
                                        Be a part of Zaitoon
                                    </div>
                                    <div className='medias'>
                                        <a href="https://www.facebook.com/zaitooncampus/" >
                                            <div className='btn_rounded'>
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </a>
                                        <a href="https://www.instagram.com/zaitooncampus/" >
                                            <div className='btn_rounded'>
                                                <i class="fa-brands fa-square-instagram"></i>
                                            </div>
                                        </a>
                                        <a href="https://api.whatsapp.com/send?phone=917510228882" >
                                            <div className='btn_rounded'>
                                                <i class="fa-brands fa-square-whatsapp"></i>
                                            </div>
                                        </a>




                                    </div>

                                </div>
                                <br />
                                <br />

                            </div>
                            <aside class="courses">
                                <h2>OUR COURSES</h2>
                                <ul>
                                    {
                                        this.courses.map((course, index) => (
                                            <li style={{
                                                backgroundImage: `url(${course.image})`,
                                            }} onClick={() => this.router.push(course.link)}> <span>{course.name}</span> </li>
                                        ))
                                    }
                                </ul>
                            </aside>
                        </section>
                        <section className='image_sect'>
                            <img src='/assets/images/zigs_payyannur.jpeg' ></img>
                        </section>

                        <section className='address_sect'>
                            <div className='address'>
                                <i class="fa-solid fa-location-dot"></i> <br />
                                <h3>Zaitoon Girls' Campus</h3>
                                <h4>Cheemeni, Payyannur</h4>
                                <h4>Kannur, Kerala, </h4>
                                <h4>India, 670 307 </h4>
                            </div>
                            <div className='map'>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15596.432787633119!2d75.21318903060657!3d12.240952763567005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba465c268164397%3A0x429135b8c750de80!2sCheemeni%2C%20Kerala!5e0!3m2!1sen!2sin!4v1705680523422!5m2!1sen!2sin"></iframe></div>
                        </section>
                        <section className='features_sect' id="features">
                            <div className='container'>

                                <br />
                                <br />
                                <h2>OUR FEATURES</h2>
                                <br />
                                <h1>Specially designed for quality</h1>

                                <div className='features_container'>
                                    {this.features.map((feature, index) => (
                                        <div className='feature' key={index}>
                                            <div className='feature_icon'>
                                                {feature.icon}
                                            </div>
                                            <h3>{feature.title}</h3>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </section>

                        <section className='mission_vision' id="mission_and_vision">
                            <hr />
                            <div className='container'>
                                <br />
                                <h2>OUR MISSION & VISION</h2>
                                <p>Zaitoon International Campus seeks to become a school of
                                    excellence moulding the value-oriented professionals in each successive generation to affect the changes that matter.
                                    <br />
                                </p>
                                <h3>We focus on..</h3>
                            </div>
                            <div className='visions_container'>
                                {this.visions.map((vision, index) => (
                                    <div className='vision' key={index}>
                                        <p>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <br />
                                            {vision}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </section>
                    </main>
                )
            }

        }
        const root = ReactDOM.createRoot(document.getElementById('about'))
        root.render(<About />)
    </script>
</body>

</html>