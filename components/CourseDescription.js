class CourseDescription extends React.Component {
    constructor(props) {
        super(props);
        this.state = { date: new Date() };
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
        end_desc: [
            {
                title: "Along with Islamic Studies",
                text: "With its firm foundations cemented by Islamic principles, Zaitoon also offers a religiously designed and constantly reviewed multidisciplinary curriculum of Islamic subjects including Islamic jurisprudence, Hadith, Quranic exegeses, spiritual and character education, etc with famous scholars graduated from renowned Islamic institutions of India as faculty."
            },
            {
                title: null,
                text: null
            }
        ],
    }
    // data = this.defaultData
    // courseName = "Higher Secondary"

    render() {
        return (
            <div className='total'>
                <div className='header'
                    style={{
                        backgroundImage: `url(../assets/images/zaitoon_building.webp)`,
                    }}>
                    <div>dklsfj</div>
                    <h1>{this.props.courseName}</h1>
                </div>


                <div className='container'>
                    <div className='desc_container'>
                        {this.props.data.desc.map((item, index) => (
                            <>
                                {item.title && index != 0 && <hr className='thickLine' />}

                                <div key={index} className='desc'>
                                    <h3>{item.title}</h3>
                                    <pre>{item.text}</pre>
                                </div>
                            </>
                        ))}
                    </div>
                    {
                        this.defaultData.features.length != 0 &&
                        <div className='features_container'>
                            {this.props.data.features.map((item, index) => (
                                <div key={index} className='feature'>
                                    <h3><i class="fa-solid fa-circle-check" style={{ color: 'var(--secondary-color)', marginRight: '.7rem' }}></i>{item.title}</h3>
                                    {item.desc.length != 0 &&
                                        <ul>
                                            {item.desc.map((item, index) => (
                                                <li key={index}>{item}</li>
                                            ))}
                                        </ul>}
                                </div>
                            ))}
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                            <div className='feature' style={{ visibility: 'hidden', padding: '0' }}></div>
                        </div>
                    }

                    <div className='line'></div>

                    <div className='desc_container'>
                        {this.props.data.end_desc.map((item, index) => (
                            <div key={index} className='desc'>
                                <h3>{item.title}</h3>
                                <p>AFLKDFLKDS</p>
                                <p>{item.text}</p>
                            </div>
                        ))}
                    </div>
                    {
                        this.props.data.end_desc.length != 0 &&
                        <div className='line'></div>
                    }
                </div>

            </div>
        )
    }
}

// const root = ReactDOM.createRoot(document.getElementById('course-description'))
// root.render(<CourseDescription />)



