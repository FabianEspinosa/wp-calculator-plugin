import React from 'react'

interface Props {
  calcNumber: number,
  getNumber: (num:number) => void
}
export default function Number({calcNumber, getNumber}:Props) {  
  return (    
    <div>{calcNumber}</div>
  )
}
