import React from 'react';
import MenuItem from './MenuItem';
import logo from "../../../images/bigscreen_logo.png";

const MenuAdmin = (props) => {

    return (
        <aside className="left-sidebar fixed-top" data-sidebarbg="skin5">
            <nav className="sidebar-nav">
                <nav className="mt-2 text-center">
                    <ul className="p-t-30">
                        <li className="sidebar-item">
                            <a className="sidebar-link waves-effect waves-dark sidebar-link" href={(props.url)}>
                                <span className="logo-text logo">
                                     <img src={logo}/>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </nav>
            <div className="scroll-sidebar">
                <nav className="sidebar-nav">
                    <nav className="mt-2">
                        <ul className="p-t-30" id="sidebarnav">
                            <MenuItem page='home' item="Accueil" icon='chart-bar'
                                      currentPage={props.page}
                                      onChangePage={props.onChangePage}/>
                            <MenuItem page='question' item="Questions" icon='receipt'
                                      currentPage={props.page}
                                      onChangePage={props.onChangePage}/>
                            <MenuItem page='answer' item="Réponses" icon='pencil'
                                      currentPage={props.page}
                                      onChangePage={props.onChangePage}/>
                        </ul>
                    </nav>
                </nav>
            </div>
        </aside>
    );
};
export default MenuAdmin;

