<!DOCTYPE html>
<html lang="en">

<body>
    <div id="desc"></div>


    <script type="text/babel">

        class Description extends React.Component {
            heading = `ZAITOON INTERNATIONAL CAMPUS`
            desc = `The epitome of excellence and best among boarding schools in Kerala. Our commitment to academic brilliance and moral values makes us a unique institution, bridging the gap between secular and religious education.

We stand as the best choice for aspiring medical (NEET) and engineering (JEE) students, offering unparalleled coaching alongside a strong foundation in Islamic studies. 

As the top residential school with NEET and JEE coaching, we provide a nurturing environment for students to excel not only in academics but also in ethical principles.Join us at Zaitoon, where we cultivate not only bright minds but also strong characters. Your quest for the best boarding school in Kerala with NEET, JEE coaching, and Islamic studies ends here — embark on a journey of academic excellence and moral enrichment with Zaitoon International Campus.`
            campuses = [
                {
                    name: "ZIGC, Kottakkal",
                    image: "../assets/images/zigs_kottakkal.webp",
                    link: "zigs_kottakkal",
                    
                },
                {
                    name: "ZIBC, Pattambi",
                    image: "../assets/images/zibs_pattambi.webp",
                    link: "zibs_pattambi",
                    
                },
                {
                    name: "ZIGC, Payyannur",
                    image: "../assets/images/zigs_payyannur.webp",
                    link: "zigs_payyannur",

                },
            ]
            router = {
                route: '/',
                push: (route) => {
                    window.location = route
                }
            }
            render() {
                return (
                    <section className='total desc_section'   >
                        <div className='container'>

                            <div className='desc' >
                                <div>
                                    <p className="welcome" data-aos="fade-zoom-in">WELCOME TO</p>
                                    <h1 data-aos="fade-zoom-in">{this.heading}</h1>

                                    <div className="bottom_line"></div>
                                    <p className="desc_text" data-aos="fade-zoom-in">{this.desc}
                                    <br/>
                                    <a href="https://youtu.be/_rZ8QmL77ts?si=4I-c87I8_27J8vXj" target="_blank"><button class="vidtour_btn" href=""><i class="fa fa-video-camera" aria-hidden="true"></i> Video tour</button></a>
                                    </p>
                                </div>
                            </div>
                            <div className='heading'>

                                <div className="campuses"  data-aos="fade-zoom-in">
                                    <p className="welcome" data-aos="fade-zoom-in">EXPLORE</p>
                                    <h1 data-aos="fade-zoom-in">OUR CAMPUSES</h1>
                                    <ul className="campus_list">
                                    {
                                        this.campuses.map((campus,index)=>(
                                            <li key={index}>
                                                <p>{campus.name}</p>
                                                <div className="bgc"></div>
                                                <img src={campus.image} alt={campus.name} />
                                                <div></div>
                                                <a href={campus.link} class="btn_explore">Explore</a>
                                            </li>
                                        ))
                                    }
                                    </ul>
                                </div>
                                {
                                    this.learnMore &&
                                    <div className='btn'
                                        onClick={() => this.router.push(this.learnMore.link)}
                                    >
                                        {this.learnMore.text}

                                        <i class="fa-solid fa-arrow-right" style={{ margin: "-1rem 0 -0.45rem .5rem" }}></i>

                                    </div>
                                }
                            </div>
                        </div>

                    </section>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('desc'))
        root.render(<Description />)
    </script>
</body>

</html>