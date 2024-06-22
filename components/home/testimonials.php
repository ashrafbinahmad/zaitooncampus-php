<!DOCTYPE html>
<html lang="en">

<body>
    <link rel="stylesheet" href="../styles/testimonials2.css?version=3">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <div id="testimonials"></div>
    <script type="text/babel">

        const data = [
            {
                stars: 5,
                name: "Hadi Abulla",
                title: "NIT Calicut (JEE)",
                photo: "/assets/testimonial/hadi.webp",
                text: "Zaitoon International Campus, my academic haven from 2021 to 2023, was the catalyst for mytriumph in JEE Mains. Now, as a Computer Science student at NIT Calicut, I reflect on the pivotal role Zaitoon played in shaping my journey. Their unwavering commitment to excellence set the stage for my academic success and personal growth, a testament to the transformative education they provide.",
            },
            {
                stars: 5,
                name: "Saniya",
                title: "Govt. Medical College, Ernakulam",
                photo: "/assets/testimonial/girl.webp",
                text: "At Zaitoon, from 2020 to 2022, I embraced a transformative journey. Clearing NEET was a milestone, and now, pursuing MBBS at Government Medical College, Ernakulam, is a dream realized. Zaitoon's personal support and comprehensive education were instrumental in shaping my path to medical excellence. Grateful for this incredible journey!",
            },
            {
                stars: 5,
                name: "Abdul Kader",
                title: "Govt. Medical College, Trivandrum",
                photo: "/assets/testimonial/abdul qader.webp",
                text: "Zaitoon, from 2019 to 2021, was the foundation of my medical journey. Attaining MBBSat Government Medical College, Trivandrum, stands as a testament to Zaitoon's commitment to academic excellence. I am extremely grateful for the journey that has set the stage for a promising future.",
            },
            {
                stars: 5,
                name: "Jasny Sherin",
                title: "B. Arch, School of Planning and Architecture (SPA) Delhi",
                photo: "/assets/testimonial/girl.png",
                text: "The two years at Zaitoon, from 2017 to 2019, were instrumental in my journey to becoming an architect. The foundation set at Zaitoon's Girls campus propelled me to excel in my journey towards B. Arch at the prestigious School of Planning and Architecture, Delhi. Thankful for the invaluable support and educational excellence.",
            },
        ]
        class Testimonials extends React.Component {
            render() {
                return (
                    <section class="testimonials_yt_total">

                        <div class="container">
                            <h2> <big> <i class="fa fa-quote-left" aria-hidden="true"></i></big> <br /> WHAT THEY SAY ABOUT US</h2>
                            <div class="testimonials">
                                <div class="testi_header">

                                </div>
                                <div class="quotes">
                                    <span class="arrow previous" onClick={() => {
                                        const testimonialScrollable = document.getElementById("testimonial_scrollable")
                                        testimonialScrollable.scrollTo({ top: 0, left: testimonialScrollable.scrollLeft - testimonialScrollable.scrollWidth / 4, behavior: "smooth" })
                                    }}> <p>&lsaquo;</p> </span>
                                    <ul class="ul" id="testimonial_scrollable">
                                        {
                                            data.map((testimonial, index) => (
                                                <li key={index} class="li childern">
                                                    <img class="testi_photo childern" src={testimonial.photo} alt={testimonial.name} />
                                                    <p class="testi_quote childern">{testimonial.text}</p>
                                                    <h4 class="testi_name childern">{testimonial.name}</h4>
                                                    <h5 class="testi_title childern">{testimonial.title}</h5>
                                                </li>
                                            ))
                                        }
                                    </ul>
                                    <span class="arrow next" onClick={() => {
                                        const testimonialScrollable = document.getElementById("testimonial_scrollable")
                                        testimonialScrollable.scrollTo({ top: 0, left: testimonialScrollable.scrollLeft + testimonialScrollable.scrollWidth / 4, behavior: "smooth" })
                                    }}> <p>&rsaquo;</p> </span>

                                </div>
                            </div>

                        </div>
                    </section>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('testimonials'))
        root.render(<Testimonials />)
    </script>
    <script>
        // DRAG TO SCROLL
        let interval = setInterval(() => {
            const testimonialScrollable = document.getElementById("testimonial_scrollable")
            testimonialScrollable.scrollTo({behavior: "smooth", top: 0, left: testimonialScrollable.scrollLeft + testimonialScrollable.scrollWidth / 4 })
            if (testimonialScrollable.scrollLeft >= (testimonialScrollable.scrollWidth / 4) * 3) testimonialScrollable.scrollTo({behavior: "smooth", top: 0, left: 0 })
        }, 5000);
    </script>
</body>

</html>