import React, {useState} from 'react';
import PageContent from './admin/PageContent';
import MenuAdmin from "./admin/MenuAdmin";

const Dashboard = () => {
    const [currentAdminPage, setCurrentAdminPage] = useState('home');

    const onNavigateHandler = (page) => {
        setCurrentAdminPage(page);
    };

    return (
        <div id="main-wrapper">
            <MenuAdmin onChangePage={onNavigateHandler} url="/" page={currentAdminPage}/>
            <PageContent page={currentAdminPage}/>
        </div>
    );
};
export default Dashboard;