import React from 'react';
import PieChart from './PieChart';
import RadarChart from './RadarChart';

const Charts = (props) => {
    let equipmentsStats = [];
    let qualityStats = [];
    let listPie;
    let listRadar;
    const handleData = (data, result) => {
        for (const [key, value] of Object.entries(data)) {
            result.push({'title': key, 'content': value});
        }
        return result;
    };

    const getRndInteger = (min, max) => {
        return Math.floor(Math.random() * (max - min)) + min;
    };

    if (props.charts.length !== 0) {
        equipmentsStats = handleData(props.charts.equipment, equipmentsStats);
        qualityStats = handleData(props.charts.quality, qualityStats);

        listPie = equipmentsStats.map((value, key) => {
            return <PieChart {...value} key={key} data={value} color={getRndInteger}/>
        });

        listRadar = <RadarChart data={qualityStats} color={getRndInteger}/>;
    }

    return (
        <div className="py-3 px-3">
            <div className="card-header col-md-12">
                <h5 className="card-title m-b-0">Statistiques des sondages</h5>
            </div>
            <div className="row">
                {listPie}
                {listRadar}
            </div>
        </div>
    );
};
export default Charts;