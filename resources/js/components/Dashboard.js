import React, {useEffect, useState} from 'react';
import PageContent from './admin/PageContent';
import MenuAdmin from "./admin/MenuAdmin";
import axios from "axios";

const Dashboard = () => {
    const [currentAdminPage, setCurrentAdminPage] = useState('home');
    const [chartsData, setChartsData] = useState([]);
    const [listquestions, setListquestions] = useState([]);
    const [listAswers, setListAswers] = useState([]);

    //récupération de la liste des questions
    useEffect(() => {
        axios.get('/questions').then(function (response) {
            setListquestions(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    //récupération de la liste des réponses
    useEffect(() => {
        axios.get('/administration/answers').then(function (response) {
            setListAswers(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    //récupération des stats
    useEffect(() => {
        axios.get('/administration/stats').then(function (response) {
            setChartsData(response.data);

        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    const onNavigateHandler = (page) => {
        setCurrentAdminPage(page);
    };

    return (
        <div id="main-wrapper">
            <MenuAdmin onChangePage={onNavigateHandler} url="/" page={currentAdminPage}/>
            <PageContent page={currentAdminPage}
                         questions={listquestions}
                         answers={listAswers}
                         graphics={chartsData}/>
        </div>
    );
};
export default Dashboard;