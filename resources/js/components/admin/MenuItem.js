import React from 'react';

const MenuItem = (props) => {
    const active = props.page === props.currentPage ? 'selected' : '';
    return (
        <li className={"sidebar-item " + active} onClick={() => props.onChangePage(props.page)}>
            <div className="sidebar-link waves-effect waves-dark">
                <i className={'mdi mdi-' + props.icon}></i>
                <span className="hide-menu">{props.item}</span>
            </div>
        </li>
    );
};
export default MenuItem;