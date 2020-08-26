import React from 'react';
import MenuItem from './MenuItem';

const MenuAdmin = (props) => {
    return (
        <nav className="mt-2">
            <ul class="p-t-30">
                <MenuItem page='Accueil' icon='home' onChangePage={props.onChangePage}/>
                <MenuItem page='Questions' icon='list' onChangePage={props.onChangePage}/>
                <MenuItem page='Réponses' icon='pen' onChangePage={props.onChangePage}/>
            </ul>
        </nav>
    );
};
export default MenuAdmin;