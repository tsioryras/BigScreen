import React, {useEffect} from 'react';
import Radar from 'chart.js';

const RadarChart = (props) => {
    const data = props.data;
    const color = props.color;
    const ctx = React.createRef();
    const handleData = (data) => {
        let values = [];
        let labels = [];
        for (const [key, value] of Object.entries(data)) {
            labels.push(value.title);
            values.push(value.content);
        }
        return {'labels': labels, 'data': values};
    };

    const chartData = {
        labels: handleData(data)['labels'],
        datasets: [{
            label: 'Note quatilé',
            data: handleData(data)['data'],
            borderColor: 'rgba(' + color(0, 255) + ',' + color(0, 255) + ',' + color(0, 255) + ',1)'
        }]
    };

    const options = {
        scale: {
            angleLines: {
                display: false
            },
            ticks: {
                suggestedMin: 0,
                suggestedMax: 5
            }
        }
    };
    useEffect(() => {
        var myRadarChart = new Chart(React.c, {
            type: 'radar',
            data: chartData,
            options: options
        });
    }, []);

    return (
        <canvas ref={ctx}/>
    );
};
export default RadarChart;