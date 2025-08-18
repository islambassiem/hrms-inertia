import React from "react";

const Home = () => {
    const handleClick = () => {
        console.log("clicked");
    }
    return (
        <div>
            <button onClick={handleClick}>Click Me</button>
        </div>
    );
};

export default Home;
