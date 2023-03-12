import React, { useState } from 'react'

interface Props {
  calcOperator: string,
  isActive: boolean,
  getOperator: (operator: string) => void
}
export default function Operator({ calcOperator, getOperator, isActive }: Props) {
  const handleEvent = () => {    
    getOperator(calcOperator)
  }
  return (
    <div className={`symbol nes-btn is-error ${isActive ? 'isActive' : ''}`} onClick={handleEvent}>{calcOperator}</div>
  )
}
