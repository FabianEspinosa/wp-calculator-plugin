import React, { useState } from "react";
import "../styles/main.scss";
import Operator from "./Operator";
import ScreenCalc from "./ScreenCalc";

interface Props {
    apiUrl: string | null
}
export function App({ apiUrl }: Props) {
    const [operadores, setOperadores] = useState(["+", "-", "*", "/", "^", "%"])
    const operations = {
        '+': 'add',
        '-': 'subtract',
        '*': 'multiply',
        '/': 'divide',
        '^': 'exponent',
        '%': 'percentage'
    };
    const [operation, setOperation] = useState('add')
    const [operationResult, setOperationResult] = useState('0')
    const [activeOperator, setActiveOperator] = useState('+');
    const [operatorA, setOperatorA] = useState(0)
    const [operatorB, setOperatorB] = useState(0)
    const getOperator = (operator: string) => {
        setOperation(operations[operator])
        if (operator === activeOperator) {
            setActiveOperator('');
        } else {
            setActiveOperator(operator);
        }
    }

    const getResult = () => {
        fetch(`${apiUrl}/${operation}/${operatorA}/${operatorB}`)
            .then(response => response.json())
            .then(data => {
                setOperationResult(data.result)
            })
            .catch(error => {
                console.error(error)
                setOperationResult('404! :(')
            });
    }

    const reset = () => {
        setOperation('add')
        setOperatorA(0)
        setOperatorB(0)
        setOperationResult('0')
    }

    return (
        <div className='nes-container is-dark with-title'>
            <p className="title">Calculadora</p>
            <span className="iconsCont">
                <a target={'_blank'} href="https://github.com/FabianEspinosa"><i className="nes-icon github is-small"></i></a>
                <a target={'_blank'} href="https://www.linkedin.com/in/faehz/"><i className="nes-icon linkedin is-small"></i></a>
            </span>
            <ScreenCalc operationResult={operationResult} />
            <div className="calc-inputs">
                <span>
                    <label htmlFor="operatorA" style={{ color: "#fff" }}>operador A</label>
                    <input className="nes-input is-dark" onChange={(event) => setOperatorA(parseInt(event.target.value))} type="number" name="operatorA" id="operatorA" value={operatorA} />
                </span>
                <span>
                    <label htmlFor="operatorB" style={{ color: "#fff" }}>operador B</label>
                    <input className="nes-input is-dark" onChange={(event) => setOperatorB(parseInt(event.target.value))} type="number" name="operatorB" id="operatorB" value={operatorB} />
                </span>
            </div>
            <div className="calc-symbols">
                {operadores.map((symbol, i) => <Operator key={i} calcOperator={symbol} getOperator={getOperator} isActive={activeOperator === symbol} />)}
            </div>
            <div className="calc-buttons">
                <button className="nes-btn" onClick={getResult}>Calcular</button>
                <button className="nes-btn" onClick={reset}>Reset</button>
            </div>
        </div>);
}