import React, {useState} from 'react'

interface Props {
    calcOperator: string,
    getOperator: (operator:string) => void
  }
  export default function Operator({calcOperator, getOperator}:Props) {   
  return ( 
    <div>{calcOperator}</div>
  )
}
