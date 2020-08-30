import React, {useEffect, useState} from 'react';
import {Radar} from 'react-chartjs-2';

const RadarChart = (props) => {

    const color = props.color;
    const [labels, setLabels] = useState();
    const [dataValue, setDataValue] = useState();
    const [bdColor, setBdColor] = useState();

    const handleData = (data) => {
        let label = [];
        let values = [];

        Object.keys(data).map((index) => {
            label.push(data[index].title);
            values.push(data[index].content);
        });

        setLabels(label);
        setDataValue(values);
        setBdColor('rgba(' + color(0, 255) + ',' + color(0, 255) + ',' + color(0, 255) + ',1)');
    }

    useEffect(() => {
        handleData(props.data);
    }, []);

    let chartData = {
        labels: labels,
        datasets: [{
            label: 'Notes de qualité',
            data: dataValue,
            borderColor: bdColor
        }]
    };

    let options = {
        scale: {
            angleLines: {
                display: true
            },
            ticks: {
                suggestedMin: 0,
                suggestedMax: 5,
                fontSize:12
            }
        },
        legend: {
            display: true,
            position: 'top',
            fontColor: '#000000',
            fontSize: 16
        }
    };

    return (
        <div className="col-md-6 mt-3 mb-5">
            <Radar data={chartData} options={options}/>
        </div>
    );
};
export default RadarChart;