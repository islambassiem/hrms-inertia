import { useAppearance } from "@/hooks/useApperance";
import { useState } from "react";


const Home = () => {
    const { appearance, updateAppearance } = useAppearance();
    const [showDropDown, setshowDropDown] = useState<boolean>(false)

    const setApperance = (appearance: 'light' | 'dark' | 'system') => {
        updateAppearance(appearance);
        setshowDropDown(false);
    }

    return (
        <div className="bg-white text-black dark:bg-gray-900 absolute">
            <button className="text-black dark:text-white" onClick={() => setshowDropDown(!showDropDown)}>Change Theme</button>
            {showDropDown && <div className="bg-indigo-600 dark:bg-white flex flex-col w-[100px] relative left-2 top-2">
                <button className={`${appearance === 'light' ? 'bg-blue-700' : ''}`} onClick={() => setApperance('light') }>Light</button>
                <button className={`${appearance === 'dark' ? 'bg-blue-700' : ''}`} onClick={() => setApperance('dark')}>Dark</button>
                <button className={`${appearance === 'system' ? 'bg-blue-700' : ''}`} onClick={() => setApperance('system')}>System</button>
            </div>}
        </div>
    );
};

export default Home;
