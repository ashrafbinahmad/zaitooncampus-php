<!DOCTYPE html>
<html lang="en">

<body>
    <link rel="stylesheet" href="../styles/videointro.css?version=2">
    <div id="videointro"></div>
    <script type="text/babel">
        import video from '/assets/zaitoonintro.mp4'

        const data = ""
        class Videointro extends React.Component {
            render() {
                return (
                    <section class="videointro">
                        <video src={video} controls>   </video>
                    </section>
                );
            }
        }

        const root = ReactDOM.createRoot(document.getElementById('videointro'))
        root.render(<Videointro />)
    </script>
</body>

</html>