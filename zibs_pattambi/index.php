<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <meta name="description" content="Zaitoon International Boys Campus- Kaipuram, Palakkad">
    <title>Zaitoon Boys Campus, Pattambi</title>

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
                    name: "SCIENCE: Bio, Math & Computer Science",
                    link: "/boys-campus/?course=science__bio_math___computer_science",
                    image: "https://as2.ftcdn.net/v2/jpg/05/79/64/29/1000_F_579642932_z3CUhYjjYWcGIWJtO30pMyYVFpDyoa1W.jpg"
                },
                {
                    name: "COMMERCE: Computer Application",
                    link: "/boys-campus/?course=commerce__computer_application",
                    image: "https://shooliniuniversity.com/blog/wp-content/uploads/2022/09/Courses-after-12-Commerce.jpg"
                },
                {
                    name: "Zaitoon Junior Program (ZJP): Grade 8-10, CBSE",
                    link: "/boys-campus/?course=zaitoon_junior_program__zjp__grade_8_to_10___cbse",
                    image: "https://t3.ftcdn.net/jpg/02/74/76/34/360_F_274763459_HADMcYrskkrAPtBDWqv4RHXz9QXjPoLX.jpg"
                },
                {
                    name: "SCHOOL OF EXCELLENCE: Grade 1-7, CBSE",
                    link: "/boys-campus/?course=school_of_excellence__cbse_grade_1_7",
                    image: "https://images.pexels.com/videos/5182682/pexels-photo-5182682.jpeg?auto=compress&cs=tinysrgb&h=627&fit=crop&w=1200",

                },
                {
                    name: "Zaitoon House of Children: KG and Pre KG",
                    link: "/boys-campus/?course=zaitoon_house_of_children__kg_and_pre_kg",
                    image: "https://cdn-cms.orchidsinternationalschool.com/blog/Right-age-for-LKG-Admissionskiprclh.png",
                },
                {
                    name: "Tanzeel: School of Quran",
                    link: "/boys-campus/?course=tanzeel__school_of_quran",
                    image: "data:image/jpeg;base64,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",
                },
                {
                    name: "Al Fathih",
                    link: "/boys-campus/?course=al-fathih",
                    image: "data:image/jpeg;base64,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",
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
                                    Zaitoon Boys Campus- Pattambi <br />

                                </h1>
                                <h2>ABOUT US</h2>
                                <p className='about_desc'>
                                    Welcome to Zaitoon International Boys Campus, situated in the idyllic setting of Kaipuram-Koppam. Our exclusive boys' campus stands as a testament to academic excellence and moral values, fostering an environment where young minds grow intellectually and ethically. As the preferred residential school for boys, we specialize in NEETand JEE coaching, offering a comprehensive program that shapes future leaders in the fields of medicine and engineering.
                                    <br />
                                    <br />
                                    <br />
                                    At Zaitoon International Boys Campus, we believe in cultivating a sense of purpose and moral fortitude alongside academic prowess. Our state-of-the-art coaching facilities, combined with the serene campus, create a perfect backdrop for holistic education. Join us on this transformative journey where academic success and ethical grounding go hand in hand.
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
                            <img src='/assets/images/zibs_pattambi.webp' ></img>
                        </section>

                        <section className='address_sect'>
                            <div className='address'>
                                <i class="fa-solid fa-location-dot"></i> <br />
                                <h3>Zaitoon Boys' Campus</h3>
                                <h4>Kaipuram, Pattambi</h4>
                                <h4>Palakkad, Kerala, </h4>
                                <h4>India, 679 308 </h4>
                            </div>
                            <div className='map'>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121796.20422149469!2d76.03241662518425!3d10.91347215019991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7b488253499dd%3A0xe9de2da398d2d69e!2sZaitoon%20International%20Campus!5e0!3m2!1sen!2sin!4v1680803120480!5m2!1sen!2sin"></iframe></div>
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