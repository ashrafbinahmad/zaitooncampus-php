class CourseDescription extends React.Component {
    constructor(props) {
        super(props);
        this.state = { date: new Date() };
    }
    urlParams = new URLSearchParams(window.location.search);
    router = {
        route: window.location.pathname,
        push: (route) => {
            window.location = route
        }
    }
    defaultData = {
        desc: [
            {
                title: "",
                text: ""
            },
            {
                title: null,
                text: "Quality higher secondary education along with entrance coaching and Islamic studies, is a rare combination that is offered nowhere else in the country. In separate campuses for boys and girls, Zaitoon offers HS education as follows:"
            },
        ],
        features: [
            {
                title: "Plus 1 Science",
                desc: [
                    "With NEET/JEE, MED/ENGG entrance coaching ",
                    "The faculty members are well experienced trainers from professional coaching centres",
                ]
            },
            {
                title: "Plus 1 Commerce",
                desc: [
                    "With CA/CMA foundation coaching",
                    "The faculty members are successful entrepreneurs of Business Administration"
                ]
            },
            {
                title: "Plus 1 Humanities",
                desc: [
                    "Civil Service foundation coaching",
                    "CUET coaching and entrance coaching for premier institutes like JMI, TISS, APU, DU, HCU, EFLU, etc.",
                    "The faculty members are research scholars from national universities",
                ]
            },
        ],

    }
    // data = this.defaultData
    // courseName = "Higher Secondary"

    render() {
        return (

            <div className='total'>
                <header>
                    <div class="slideshow">
                        <img src="../assets/images/zigs_kottakkal.webp" class="slide_1"></img>
                        <img src="../assets/images/zibs_pattambi.webp" class="slide_2"></img>
                        <img src="../assets/images/zigs_payyannur.webp" class="slide_3"></img>
                    </div>
                    <div class="heading_and_btn">
                        {this.props.same_courses?.includes(this.props.courseName) ? <div className="other_courses">
                            {
                                this.props.same_courses_with_link.map((same_course_item, index) => (
                                    <a href={same_course_item.link} className={same_course_item.link?.replace("/girls-campus/?course=", "").replace("/boys-campus/?course=", "") == this.urlParams.get('course') ? "active_course" : "non_active_course"}>{same_course_item.name}</a>
                                ))
                            }
                        </div> : ""}
                        <h1>{this.props.courseName}</h1>
                        <button onClick={() => this.router.push("/admission")}>ADMISSION PROCESS</button>
                    </div>

                </header>

                <div className='container'>
                    <div className='desc_container'>


                        {this.props.data?.title && <hr className='thickLine' />}

                        <div className='desc'>
                            {
                                this.props.data?.yt ? <iframe class="yt_iframe" width="100%" height="315" src={`https://www.youtube.com/embed/${this.props.data?.yt.replace('https://youtu.be/','')}&amp;controls=0`} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> : ''
                            }
                            
                            <h3>{this.props.data?.title}</h3>
                            <p class="welcome"><b><i><small>{this.props.data?.welcome}</small></i></b></p>
                            <p>{this.props.data?.content}</p>
                        </div>


                    </div>
                    {
                        this.defaultData.features?.length != 0 &&
                        <div className='features_container'>
                            {this.props.data.features?.map((item, index) => (
                                item?.heading == '' && item?.content == '' || <div key={index} className='feature'>
                                    <h3><i class="fa_-solid fa_-circle-check" style={{ color: 'var(--secondary-color)', marginRight: '0rem' }}></i>{item?.heading}</h3>
                                    <p key={index}>{item?.content}</p>
                                </div>
                            ))}
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                        </div>
                    }

                    <div className='line'></div>
                </div>

            </div>
        )
    }
}




