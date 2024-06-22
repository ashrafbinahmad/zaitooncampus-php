[33mcommit 345741994c0d41eede00fd9a1ef7a2dedd9680fd[m[33m ([m[1;36mHEAD -> [m[1;32mmaster[m[33m, [m[1;31morigin/master[m[33m)[m
Author: ashrafp216 <ashrafp216@gmail.com>
Date:   Fri Apr 21 15:43:14 2023 +0530

    dynamized courses

[1mdiff --git a/components/footer.php b/components/footer.php[m
[1mindex b11201b..9ba44ad 100644[m
[1m--- a/components/footer.php[m
[1m+++ b/components/footer.php[m
[36m@@ -14,146 +14,211 @@[m
 [m
     <script type="text/babel">[m
 [m
[31m-        function Footer() {[m
[31m-            const router = {[m
[31m-                route: window.location.pathname,[m
[31m-                push: (route) => {[m
[31m-                    window.location = route[m
[32m+[m[32m        class Footer extends React.Component {[m
[32m+[m[32m            constructor(props) {[m
[32m+[m[32m                super(props);[m
[32m+[m[32m                this.state = {[m
[32m+[m[32m                    campusCourses: [],[m
[32m+[m[32m                    boysCourses: [],[m
[32m+[m[32m                    girlsCourses: [],[m
                 }[m
             }[m
[31m-            const s = {}[m
[31m-            const quickLinks = [[m
[31m-                {[m
[31m-                    name: 'Home',[m
[31m-                    link: '/',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'About Girls Campus',[m
[31m-                    link: '/about_zaitoon_girls_campus',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'About Boys Campus',[m
[31m-                    link: '/about_zaitoon_boys_campus',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'News & Events',[m
[31m-                    link: '/events',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'Gallery',[m
[31m-                    link: '/photo_gallery',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'Admission',[m
[31m-                    link: '/admission',[m
[31m-                },[m
[31m-                {[m
[31m-                    name: 'Contact us',[m
[31m-                    link: '/contact',[m
[31m-                },[m
[31m-            ];[m
[31m-            const courses = [[m
[31m-                { name: 'Zaitoon Higher Secondary', link: '/higher-secondary/' },[m
[31m-                { name: 'Zaitoon Entrance Academy', link: '/entrance-academy/' },[m
[31m-                { name: 'Zaitoon Graduate Academy', link: '/graduate-academy/' },[m
[31m-                // { name: 'Zaitoon Commerce Academy', link: '/commerce-academy/' },[m
[31m-                // { name: 'Zaitoon Civil Services Academy', link: '/civil-services-academy/' },[m
[31m-                // { name: 'Zaitoon Mavadhah', link: '/mavadhah/' },[m
[31m-                { name: 'Zaitoon Junior Program', link: '/junior-program/' },[m
[31m-            ][m
[31m-            return ([m
[31m-                <>[m
[31m-                    <footer className='total' id='footer' data-aos="fade-zoom-in">[m
[31m-                        <div className='container'>[m
[31m-                            <div className='logo_area'>[m
[31m-                                <img src="/assets/logo.png" alt="logo" />[m
[31m-                                <h1>ZAITOON</h1>[m
[31m-                                <h3>[m
[31m-                                    International Campus[m
[31m-                                </h3>[m
[31m-                                <p>[m
[31m-                                    Zaitoon International Campus (ZIC) is an educational centre under[m
[31m-                                    Zaitoon Foundation.[m
[31m-                                </p>[m
[31m-                            </div>[m
[31m-                            <div className='address_area'>[m
 [m
[31m-                                <p>[m
[32m+[m[32m            setCampusCourses = (data) => {[m
[32m+[m[32m                this.setState({ campusCourses: data })[m
[32m+[m[32m            }[m
[32m+[m
[32m+[m[32m            setGirlsCourses = (data) => {[m
[32m+[m[32m                this.setState({ girlsCourses: data })[m
[32m+[m[32m            }[m
[32m+[m
[32m+[m[32m            setBoysCourses = (data) => {[m
[32m+[m[32m                this.setState({ boysCourses: data })[m
[32m+[m[32m            }[m
[32m+[m
[32m+[m[32m            loadData() {[m
[32m+[m[32m                getAllData('courses').then((querySnapShot) => {[m
[32m+[m[32m                    const data = querySnapShot.docs.map((doc) => {[m
[32m+[m[32m                        return { ...doc.data(), id: doc.id };[m
[32m+[m
[32m+[m[32m                    }[m
[32m+[m[32m                    );[m
[32m+[m
[32m+[m
[32m+[m[32m                    let boysCourses = data.filter(item => item.campus == "Boys")[m
[32m+[m[32m                    console.log(boysCourses)[m
[32m+[m[32m                    boysCourses = boysCourses.map(item => {[m
[32m+[m[32m                        return { name: item.courseName, link: "/boys-campus?course=" + item.url.toLowerCase() }[m
[32m+[m[32m                    })[m
[32m+[m[32m                    this.setBoysCourses(boysCourses)[m
[32m+[m[32m                    let girlsCourses = data.filter(item => item.campus == "Girls")[m
[32m+[m[32m                    girlsCourses = girlsCourses.map(item => {[m
[32m+[m[32m                        return { name: item.courseName, link: "/girls-campus?course=" + item.url.toLowerCase() }[m
[32m+[m[32m                    })[m
[32m+[m[32m                    this.setGirlsCourses(girlsCourses)[m
[32m+[m[32m                    console.log(girlsCourses)[m
[32m+[m
[32m+[m[32m                })[m
[32m+[m[32m            }[m
[32m+[m
[32m+[m
[32m+[m[32m            componentDidMount() {[m
[32m+[m[32m                this.loadData()[m
[32m+[m[32m            }[m
[32m+[m[32m            render() {[m
[32m+[m
[32m+[m[32m                const router = {[m
[32m+[m[32m                    route: window.location.pathname,[m
[32m+[m[32m                    push: (route) => {[m
[32m+[m[32m                        window.location = route[m
[32m+[m[32m                    }[m
[32m+[m[32m                }[m
[32m+[m[32m                const s = {}[m
[32m+[m[32m                const quickLinks = [[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'Home',[m
[32m+[m[32m                        link: '/',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'About Girls Campus',[m
[32m+[m[32m                        link: '/about_zaitoon_girls_campus',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'About Boys Campus',[m
[32m+[m[32m                        link: '/about_zaitoon_boys_campus',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'News & Events',[m
[32m+[m[32m                        link: '/events',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'Gallery',[m
[32m+[m[32m                        link: '/photo_gallery',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'Admission',[m
[32m+[m[32m                        link: '/admission',[m
[32m+[m[32m                    },[m
[32m+[m[32m                    {[m
[32m+[m[32m                        name: 'Contact us',[m
[32m+[m[32m                        link: '/contact',[m
[32m+[m[32m                    },[m
[32m+[m[32m                ];[m
[32m+[m[32m                const courses = [...this.state.boysCourses, ...this.state.girlsCourses][m
[32m+[m
[32m+[m[32m                // [[m
[32m+[m[32m                //     { name: 'Zaitoon Higher Secondary', link: '/higher-secondary/' },[m
[32m+[m[32m                //     { name: 'Zaitoon Entrance Academy', link: '/entrance-academy/' },[m
[32m+[m[32m                //     { name: 'Zaitoon Graduate Academy', link: '/graduate-academy/' },[m
[32m+[m[32m                //     // { name: 'Zaitoon Commerce Academy', link: '/commerce-academy/' },[m
[32m+[m[32m                //     // { name: 'Zaitoon Civil Services Academy', link: '/civil-services-academy/' },[m
[32m+[m[32m                //     // { name: 'Zaitoon Mavadhah', link: '/mavadhah/' },[m
[32m+[m[32m                //     { name: 'Zaitoon Junior Program', link: '/junior-program/' },[m
[32m+[m[32m                // ][m
[32m+[m[32m                return ([m
[32m+[m[32m                    <>[m
[32m+[m[32m                        <footer className='total' id='footer' data-aos="fade-zoom-in">[m
[32m+[m[32m                            <div className='container'>[m
[32m+[m[32m                                <div className='logo_area'>[m
[32m+[m[32m                                    <img src="/assets/logo.png" alt="logo" />[m
[32m+[m[32m                                    <h1>ZAITOON</h1>[m
[32m+[m[32m                                    <h3>[m
[32m+[m[32m                                        International Campus[m
[32m+[m[32m                                    </h3>[m
[32m+[m[32m                                    <p>[m
[32m+[m[32m                                        Zaitoon International Campus (ZIC) is an educational centre under[m
[32m+[m[32m                                        Zaitoon Foundation.[m
[32m+[m[32m                                    </p>[m
[32m+[m[32m                                </div>[m
[32m+[m[32m                                <div className='address_area'>[m
[32m+[m
[32m+[m[32m                                    <p>[m
[32m+[m[32m                                        <br />[m
[32m+[m[32m                                        Zaitoon Boys Campus <br />[m
[32m+[m[32m                                        Kaipuram, Pattambi <br />[m
[32m+[m[32m                                        Malappuram, Kerala, India <br />[m
[32m+[m
[32m+[m[32m                                    </p>[m
[32m+[m[32m                                    <hr style={{ borderWidth: '1px', borderColor: '#ffffff1a' }} />[m
[32m+[m[32m                                    <p>[m
[32m+[m[32m                                        Zaitoon Girls Campus <br />[m
[32m+[m[32m                                        Kottakkal, Pang Chendi <br />[m
[32m+[m[32m                                        Malappuram, Kerala, India <br />[m
[32m+[m
[32m+[m[32m                                    </p>[m
                                     <br />[m
[31m-                                    Zaitoon Boys Campus <br />[m
[31m-                                    Kaipuram, Pattambi <br />[m
[31m-                                    Malappuram, Kerala, India <br />[m
 [m
[31m-                                </p>[m
[31m-                                <hr style={{ borderWidth: '1px', borderColor: '#ffffff1a' }} />[m
[31m-                                <p>[m
[31m-                                    Zaitoon Girls Campus <br />[m
[31m-                                    Kottakkal, Pang Chendi <br />[m
[31m-                                    Malappuram, Kerala, India <br />[m
 [m
[31m-                                </p>[m
[31m-                                <br />[m
[32m+[m[32m                                </div>[m
[32m+[m[32m                                <div className='quick_links'>[m
 [m
[32m+[m[32m                                    <ul>[m
[32m+[m[32m                                        {quickLinks.map((link, index) => ([m
[32m+[m[32m                                            <li key={index}>[m
[32m+[m[32m                                                <a href={link.link}>{link.name}</a>[m
[32m+[m[32m                                                <hr />[m
[32m+[m[32m                                            </li>[m
[32m+[m[32m                                        ))}[m
[32m+[m[32m                                    </ul>[m
[32m+[m[32m                                    <ul>[m
[32m+[m[32m                                        <li style={{ fontWeight: 'bold', }}>Zaitoon Boys Campus</li>[m
 [m
[31m-                            </div>[m
[31m-                            <div className='quick_links'>[m
[31m-[m
[31m-                                <ul>[m
[31m-                                    {quickLinks.map((link, index) => ([m
[31m-                                        <li key={index}>[m
[31m-                                            <a href={link.link}>{link.name}</a>[m
[31m-                                            <hr />[m
[31m-                                        </li>[m
[31m-                                    ))}[m
[31m-                                </ul>[m
[31m-                                <ul>[m
[31m-                                    {courses.map((link, index) => ([m
[31m-                                        <li key={index}>[m
[31m-                                            <a href={link.link}>{link.name}</a>[m
[31m-                                            <hr />[m
[31m-                                        </li>[m
[31m-                                    ))}[m
[31m-                                </ul>[m
[31m-                            </div>[m
[31m-                            <div className='contact'>[m
[31m-                                <div className='phone_numbers'>[m
[31m-                                    <h5>+91 7510 22 8881</h5>[m
[31m-                                    <h5>+91 7510 22 8882</h5>[m
[32m+[m[32m                                        {this.state.boysCourses.map((link, index) => ([m
[32m+[m[32m                                            <li key={index}>[m
[32m+[m[32m                                                <a href={link.link}>{link.name}</a>[m
[32m+[m[32m                                                <hr />[m
[32m+[m[32m                                            </li>[m
[32m+[m[32m                                        ))}[m
[32m+[m[32m                                        <li style={{ fontWeight: 'bold', }}>Zaitoon Girls Campus</li>[m
[32m+[m
[32m+[m[32m                                        {this.state.girlsCourses.map((link, index) => ([m
[32m+[m[32m                                            <li key={index}>[m
[32m+[m[32m                                                <a href={link.link}>{link.name}</a>[m
[32m+[m[32m                                                <hr />[m
[32m+[m[32m                                            </li>[m
[32m+[m[32m                                        ))}[m
[32m+[m[32m                                    </ul>[m
                                 </div>[m
[31m-                                <div className='social_media'>[m
[31m-[m
[31m-                                    <a href="https://www.facebook.com/zaitooncampus" target="_blank">[m
[31m-                                        {/* <FacebookRounded />  */}[m
[31m-                                        <i class="fab fa-facebook-f"></i>[m
[31m-                                    </a>[m
[31m-                                    <a href="https://www.instagram.com/zaitooncampus/" target="_blank">[m
[31m-                                        {/* <Instagram />  */}[m
[31m-                                        <i class="fab fa-instagram"></i>[m
[31m-                                    </a>[m
[31m-                                    <a href="https://wa.me/917510228881" target="_blank">[m
[31m-                                        {/* <WhatsApp />  */}[m
[31m-                                        <i class="fab fa-whatsapp"></i>[m
[31m-                                    </a>[m
[31m-                                    <a href="tel:+917510228882" target="_blank">[m
[31m-                                        {/* <CallRounded />  */}[m
[31m-                                        <i class="fas fa-phone"></i>[m
[31m-                                    </a>[m
[32m+[m[32m                                <div className='contact'>[m
[32m+[m[32m                                    <div className='phone_numbers'>[m
[32m+[m[32m                                        <h5>+91 7510 22 8881</h5>[m
[32m+[m[32m                                        <h5>+91 7510 22 8882</h5>[m
[32m+[m[32m                                    </div>[m
[32m+[m[32m                                    <div className='social_media'>[m
[32m+[m
[32m+[m[32m                                        <a href="https://www.facebook.com/zaitooncampus" target="_blank">[m
[32m+[m[32m                                            {/* <FacebookRounded />  */}[m
[32m+[m[32m                                            <i class="fab fa-facebook-f"></i>[m
[32m+[m[32m                                        </a>[m
[32m+[m[32m                                        <a href="https://www.instagram.com/zaitooncampus/" target="_blank">[m
[32m+[m[32m                                            {/* <Instagram />  */}[m
[32m+[m[32m                                            <i class="fab fa-instagram"></i>[m
[32m+[m[32m                                        </a>[m
[32m+[m[32m                                        <a href="https://wa.me/917510228881" target="_blank">[m
[32m+[m[32m                                            {/* <WhatsApp />  */}[m
[32m+[m[32m                                            <i class="fab fa-whatsapp"></i>[m
[32m+[m[32m                                        </a>[m
[32m+[m[32m                                        <a href="tel:+917510228882" target="_blank">[m
[32m+[m[32m                                            {/* <CallRounded />  */}[m
[32m+[m[32m                                            <i class="fas fa-phone"></i>[m
[32m+[m[32m                                        </a>[m
[32m+[m[32m                                    </div>[m
                                 </div>[m
[31m-                            </div>[m
 [m
 [m
[32m+[m[32m                            </div>[m
[32m+[m[32m                        </footer>[m
[32m+[m[32m                        <div id='wh-floating'[m
[32m+[m[32m                            onClick={() => {[m
[32m+[m[32m                                window.open('https://api.whatsapp.com/send?phone=917510228882&text=Hi', '_blank')[m
[32m+[m[32m                            }}[m
[32m+[m[32m                        >[m
[32m+[m[32m                            <p>Message us </p>[m
[32m+[m[32m                            <i class="fa-brands fa-whatsapp"></i>[m
                         </div>[m
[31m-                    </footer>[m
[31m-                    <div id='wh-floating'[m
[31m-                        onClick={() => {[m
[31m-                            window.open('https://api.whatsapp.com/send?phone=917510228882&text=Hi', '_blank')[m
[31m-                        }}[m
[31m-                    >[m
[31m-                        <p>Message us </p>[m
[31m-                        <i class="fa-brands fa-whatsapp"></i>[m
[31m-                    </div>[m
[31m-                </>[m
[31m-            );[m
[32m+[m[32m                    </>[m
[32m+[m[32m                );[m
[32m+[m[32m            }[m
         }[m
 [m
         const root = ReactDOM.createRoot(document.getElementById('footer'))[m
[1mdiff --git a/components/home/courses_dynamic.php b/components/home/courses_dynamic.php[m
[1mindex 66b0ac8..d6a1f04 100644[m
[1m--- a/components/home/courses_dynamic.php[m
[1m+++ b/components/home/courses_dynamic.php[m
[36m@@ -45,7 +45,7 @@[m
             render() {[m
                 return ([m
                     <>[m
[31m-                        <h3 style={{ textAlign: "center", padding: '.2rem', color: 'green', margin: 'auto', width: 'fit-content', opacity: '.5' }}>{this.props.campusType} Campus</h3>[m
[32m+[m[32m                        <h3 style={{ textAlign: "center", padding: '.2rem', color: '#03380c', margin: 'auto', width: 'fit-content', opacity: '.5', textTransform: 'uppercase', fontSize: '18px', fontWeight: '600' }}>{this.props.campusType} Campus</h3>[m
                         <ul >[m
 [m
                             {[m
[36m@@ -72,7 +72,7 @@[m
                                 ))[m
                             }[m
                             {[m
[31m-                                // <li style={{ visibility: 'hidden' }}></li>[m
[32m+[m[32m                                <li style={{ visibility: 'hidden' }}></li>[m
                             }[m
                         </ul>[m
                         <br />[m
[1mdiff --git a/components/navbar.php b/components/navbar.php[m
[1mindex 3a8204e..015536e 100644[m
[1m--- a/components/navbar.php[m
[1m+++ b/components/navbar.php[m
[36m@@ -99,7 +99,7 @@[m
                             })[m
                         },[m
                     ][m
[31m-                    console.log(menuData)[m
[32m+[m[32m                    // console.log(menuData)[m
 [m
                     this.setHeadedCourses(menuData)[m
 [m
[36m@@ -219,7 +219,7 @@[m
                                                             {[m
                                                                 this.state.headedCourses?.map((headedItem, index) => ([m
                                                                     <>[m
[31m-                                                                        <li style={{ fontWeight: 'bold', backgroundColor: 'var(--primary-color)', color: 'white', opacity: '.8' }}>{headedItem?.heading}</li>[m
[32m+[m[32m                                                                        <li style={{ fontWeight: 'bold', backgroundColor: 'var(--primary-color)', color: 'white', opacity: '.8', padding: '3px 1rem' }}>{headedItem?.heading}</li>[m
                                                                         {[m
                                                                             headedItem?.items?.map((subItem, index) => ([m
                                                                                 <li className={`subMenuItem ${this.router.route == subItem.link ? 'active' : ''}`} key={index}[m
[36m@@ -228,6 +228,7 @@[m
                                                                                 </li>[m
                                                                             ))[m
                                                                         }[m
[32m+[m[32m                                                                        <div style={{ height: "1rem" }}></div>[m
                                                                     </>[m
 [m
 [m
