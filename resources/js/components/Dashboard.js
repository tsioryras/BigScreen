import React, {useState} from 'react';
import PageContent from './admin/PageContent';

const Dashboard = () => {
    const [currentAdminPage, setCurrentAdminPage] = useState('Accueil');

    const onNavigateHandler = (page) => {
        setCurrentAdminPage(page);
    };

    return (
        <PageContent page={currentAdminPage}/>
    );
};
export default Dashboard;