@extends('user.Appuser')

@section('style')
    <style>

.section{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: center;
    margin: 0px 60px 30px 60px;
}
.lamp-container img {
    height: 600px;
    width: 600px;
    margin-top: 10%;
}
.text-container-v1{
    max-width: 1200px;
    margin: 5% 0% 5% 15%;

}

.text-container-v1 h1{
    font-size: 70px;
    font-weight: 600;
    margin: 40px 0;
}

.text-container p{
    line-height: 30px;
}

.text-container-v1 p{
    margin: 20px 0;
    line-height: 30px;
}
.text-container-v1 a{
    text-decoration: none;
    background: #00986f;
    padding: 14px 40px;
    display: inline-block;
    color: #fff;
    font-size: 18px;
    margin-top: 30px;
    border-radius: 30px;
}

.text-container{
    display: flex;
    flex-direction: row;
    align-items: stretch;
    gap: 5%;
    margin: 5%;
}

.text-container h1{
    font-size: 70px;
    font-weight: 600;
    margin: 40px 0;
}

.text-container p{
    line-height: 30px;
}

.text-container p{
    margin: 20px 0;
    line-height: 30px;
}
.text-container a{
    text-decoration: none;
    background: #00986f;
    padding: 14px 40px;
    display: inline-block;
    color: #fff;
    font-size: 18px;
    margin-top: 30px;
    border-radius: 30px;
}
.control{
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-top: 150px;
}
.control .line{
    width: 250px;
    height: 4px;
    background: #fff;
    margin: 0 20px;
    border-radius: 2px;
}
.control .line span{
    width: 50%;
    height: 8px;
    margin-top: -2px;
    border-radius: 4px;
    background: #00986f;
    display: block;
}
.active{
    background: green;
}
.active span{
    background: #fff;
    margin-left: 31px;
}
.on{
    opacity: 1;
}

    </style>
@endsection

@section('content')

    <div class="text-container-v1">
        <h1>About Us</h1>
        <p>We are Frigo Tools, a premier supplier specializing in a comprehensive range of refrigeration products including PVC profiles, sandwich panels, and various fittings essential for modern refrigeration solutions. Founded to meet the increasing demands of both commercial and residential projects, our expertise lies in offering high-quality, durable products tailored to the specifics of refrigeration construction and maintenance.</p>
    </div>
    <div class="text-container">
        <div class="Our-Mission">
            <h2>Our Mission</h2>
            <p>Our mission at Frigo Tools is to simplify the complexities of refrigeration setup and maintenance by providing a one-stop shop for all necessary components, from PVC plinthes to composite profiles. We aim to make high-quality refrigeration parts accessible to a broad range of clients, ensuring that both professionals and enthusiasts have the resources they need to execute their projects efficiently.</p>
        </div>

        <div class="Our-Values">
            <h2>Our Values</h2>
            <p>Integrity, reliability, and innovation are the cornerstones of our business at Frigo Tools. We are committed to maintaining high standards in our products and services, ensuring that each component meets rigorous quality controls. Our dedication to customer satisfaction drives us to continually enhance our product offerings and customer service practices, aligning with the evolving needs of the refrigeration industry.</p>
        </div>

        <div class="Looking-Ahead">
            <h2>Looking Ahead</h2>
            <p>Looking to the future, Frigo Tools is excited about the advancements in refrigeration technology and materials science. We are actively exploring sustainable materials and innovative manufacturing processes that will set new standards in efficiency and durability. Our goal is to remain at the forefront of the industry, providing our clients with the latest and most effective solutions available.</p>
        </div>
    </div>


@endsection

