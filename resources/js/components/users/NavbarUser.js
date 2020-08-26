import React from 'react';

const Navbar = (props) => {

    return (
        <header className="fixed-top btn-dark" data-navbarbg="skin5">
            <nav className="navbar top-navbar navbar-expand-md navbar-dark">
                <div className="navbar-header" data-logobg="skin5">
                    <i className="ti-menu ti-close"></i>
                    <a className="navbar-brand" href={props.url}>
                    <span className="logo-text">
                        BIG SCREEN
                    </span>
                    </a>
                </div>
            </nav>
        </header>
    );
};
export default Navbar;