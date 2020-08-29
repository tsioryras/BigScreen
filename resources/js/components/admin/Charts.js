import React from 'react';
import PieChart from './PieChart';
import RadarChart from './RadarChart';

const Charts = (props) => {
    if (props.charts.length !== 0) {
        const data = props.charts.equipment;
        for (const [key, value] of Object.entries(data)) {
            console.log(data[key]);
        }
        console.log(props.charts);
    }


    return (
        <div className="py-3 text-center">
            <div className="card-header">
                <h5 className="card-title m-b-0">Statistiques des sondages</h5>
            </div>
            <div className="row">
                <PieChart/>
                <PieChart/>
                <PieChart/>
                <RadarChart/>
            </div>
        </div>
    );
};
export default Charts;