import React from 'react';
import Navbar from "./users/NavbarUser";
import PageContent from "./users/PageContent";

function App() {
    return (
        <div id="main-wrapper">
            <Navbar url={'/'}/>
            <PageContent/>
        </div>
    );
}

export default App;