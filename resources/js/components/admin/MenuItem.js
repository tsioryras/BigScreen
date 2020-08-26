import React from 'react';

const MenuItem = (props) => {
    return (
        <li className="sidebar-item" onClick={() => props.onChangePage(props.page)}>
            <a className="sidebar-link waves-effect waves-dark sidebar-link"
               href="#"
               aria-expanded="false">
                <i className={'mdi mdi-view-' + props.icon}></i>
                <span className="hide-menu">{props.page}</span>
            </a>
        </li>
    );
};
export default MenuItem;