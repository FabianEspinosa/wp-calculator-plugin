import React, { useState } from "react";
import "../styles/main.scss";
import Number from "./Number";
import Operator from "./Operator";
import ScreenCalc from "./ScreenCalc";

interface Props {
    apiUrl: string | null
}
export function App({ apiUrl }: Props) {
    const getNumber = (num:number) => {
        console.log(num)
    }
    const getOperator = (operator:string) => {
        console.log(operator)
    }

    const [operadores, setOperadores] = useState([ "+","-","*","/","^","%"])


    return (
        <div>
            <ScreenCalc />
            {Array(10).fill(null).map((_, i) => <Number key={i} calcNumber={i} getNumber={getNumber} />)}
            {operadores.map((symbol, i) => <Operator key={i} calcOperator={symbol} getOperator={getOperator} />)}
            
        </div>);
}