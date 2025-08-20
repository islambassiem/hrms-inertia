const Options = ({ children  }: { children : React.ReactNode }) => {
    return (
        <div className='absolute right-0 rtl:left-0 rtl:right-auto w-60 bg-surface flex flex-col mx-4 shadow-lg rounded-lg'>
            {children}
        </div>
    )
}

export default Options
