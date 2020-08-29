import React, {useEffect, useState} from 'react';
import {Pie} from 'react-chartjs-2';
import 'chartjs-plugin-labels';

const PieChart = (props) => {
    const color = props.color;
    const [datas, setDatas] = useState();
    // const [optionsChart, setOptionsChart] = useState();
    const [labels, setLabels] = useState();
    const [dataValue, setDataValue] = useState();
    const [bgColor, setBgColor] = useState();
    const [bdColor, setBdColor] = useState();

    const handleData = (data) => {
        let bgcolors = [];
        let bdcolors = [];
        let values = [];
        let label = [];
        Object.keys(data).map((index) => {
            label.push(index);
            values.push(data[index]);
            let r = color(0, 255);
            let g = color(0, 255);
            let b = color(0, 255);
            bgcolors.push('rgba(' + r + ',' + g + ',' + b + ',0.5)');
            bdcolors.push('rgba(' + r + ',' + g + ',' + b + ',1)');
        });
        setLabels(label);
        setDataValue(values);
        setBgColor(bgcolors);
        setBdColor(bdcolors);
    }

    useEffect(() => {
        setDatas(handleData(props.data.content));
    }, []);

    let dataChart = {
        labels: labels,
        datasets: [
            {
                label: props.title,
                backgroundColor: bgColor,
                hoverBackgroundColor: bdColor,
                data: dataValue
            }
        ]
    };

    let optionsChart = {
        title: {
            display: true,
            text: props.data.title,
            fontSize: 18,
            fontColor: '#6c757d'
        },
        legend: {
            display: true,
            position: 'right',
            fontColor: '#000000',
            fontSize: 12
        },
        plugins: {
            labels: {
                render: 'percentage',
                fontColor: '#000000',
                precision: 2,
                arc: true,
            }
        }
    };
    return (
        <div className="col-md-6 mt-3 mb-5">
            <Pie data={dataChart} options={optionsChart}/>
        </div>
    );

};
export default PieChart;