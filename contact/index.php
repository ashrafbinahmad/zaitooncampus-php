<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../lib/head.php'; ?>
    <link rel="stylesheet" href="../styles/contact.css?version=2">
    <title>Zaitoon Campus | Contact us</title>

</head>

<body>
    <?php include '../components/navbar.php'; ?>

    <div id="contact"></div>
    <?php include '../components/footer.php'; ?>



    <script type="text/babel">

        class Contact extends React.Component {
            render() {
                return (
                    <>
                        <section className='header'>
                            <h1>Get in touch</h1>
                        </section>
                        <section className='contact' >
                            <div className='basic_contacts' >
                                <h2>Contact Us</h2>
                                <div >
                                    <i class="fa-solid fa-phone-flip"></i>
                                    <a href='tel:+917510228881' > <span>/ </span>75 1022 8881</a>
                                </div>
                                <div >
                                    <i class="fa-solid fa-phone-flip"></i>
                                    <a href='tel:+917510228882' ><span>/ </span>75 1022 8882</a>
                                </div>
                                <div >
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <a href='https://api.whatsapp.com/send?phone=917510228882' ><span>/ </span>75 1022 8882</a>

                                </div>
                                <div >
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href='mailto:zaitooncampus@gmail.com'><span>/ </span>zaitooncampus@gmail.com</a>
                                </div>
                                <div >
                                    <i class="fa-brands fa-square-facebook"></i>
                                    <a href='https://www.facebook.com/zaitooncampus/'><span>/ </span>zaitooncampus</a>
                                </div>
                                <div >
                                    <i class="fa-brands fa-square-instagram"></i>
                                    <a href='https://www.instagram.com/zaitooncampus/'><span>/ </span>@zaitooncampus</a>
                                </div>
                            </div>
                            <div className='address' >
                                <h2 >Visit Us</h2>

                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                                <br />
                                <h3 style={{fontFamily:'serif'}}>ZAITOON</h3>
                                <p>International <br />
                                    Campus</p>
                                <p>
                                    <br />
                                    Girls Campus - Kottakkal, Pang Chendi <br />
                                    Boys Campus - Kaipuram, Pattambi <br />
                                    Malappuram,<br /> Kerala, India <br />
                                </p>
                            </div>
                            <div className='send' id='map' >
                                {//<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15667.599787653671!2d76.0073856!3d10.9709243!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe9de2da398d2d69e!2sZaitoon+International+Girls+Campus!5e0!3m2!1sen!2sin!4v1543829461141" frameborder="0"></iframe>
                                }

                                <h2>Send to us</h2>
                                <form>
                                    <textarea name="" id="messageText" ></textarea>
                                    <button
                                        onClick={() => {
                                            if (document.querySelector('#messageText').value == '') {
                                                alert('Please enter a message')
                                                return
                                            }
                                            window.open('https://api.whatsapp.com/send?phone=917510228882&text=' + document.querySelector('#messageText').value)
                                    }}
                                    ><i class="fa-brands fa-whatsapp"></i> Send in Whatsapp</button>
                                </form>

                            </div>
                        </section>
                    </>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('contact'))
        root.render(<Contact />)
    </script>
</body>

</html>