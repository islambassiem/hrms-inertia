import { memo, useEffect, useRef, useState } from "react";

import { t } from "i18next";

import { GoChevronDown } from "react-icons/go";
import { VscClearAll } from "react-icons/vsc";
import { IoCloseOutline } from "react-icons/io5";
import { CiSearch } from "react-icons/ci";

interface Item {
    id: string | number;
    name: string;
}


interface MultiSelectProps {
    items: Item[];
    selected: string[];
    onChange: (selected: string[]) => void;
    name: string;
}

const MultiSelect = ({ items, selected, onChange, name = "items" }: MultiSelectProps) => {
    const wapperRef = useRef<HTMLElement>(null);
    const [isOpen, setIsOpen] = useState(false);
    const [search, setSearch] = useState("");
    const handleSelectAll = (checked: boolean) => {
        onChange(checked ? items.map((item) => String(item.id)) : []);
    };

    const handleToggle = (id: string) => {
        if (selected.includes(id)) {
            onChange(selected.filter((s) => s !== id));
        } else {
            onChange([...selected, id]);
        }
    };

    useEffect(() => {
        function handleClickOutside(e: MouseEvent) {
            if (wapperRef.current && !wapperRef.current.contains(e.target as Node)) {
                setIsOpen(false);
            }
        }

        document.addEventListener("click", handleClickOutside);
        return () => {
            document.removeEventListener("click", handleClickOutside);
        };
    }, [])

    return (
        <section ref={wapperRef}>
            <div
                onClick={() => setIsOpen(!isOpen)}
                className="border border-border rounded-md px-4 py-2 cursor-pointer select-none flex justify-between items-center min-w-[150px]"
            >
                <span>{selected.length > 0 ? `${selected.length} ${t('Selected')}` : t('Select')}</span>
                <GoChevronDown className={`transition duration-300 ${isOpen ? 'rotate-180' : ''}`}/>
            </div>
            {isOpen && (
                <div className={`absolute z-10 mt-1 border bg-bg border-border rounded-md shadow-lg p-4 max-h-60 overflow-y-auto max-w-fit min-w-56 space-y-3`}>
                    <div className="py-4 px-2 flex gap-2 justify-between items-center">
                            <input
                                type="checkbox"
                                id={`${name}-select-all`}
                                checked={selected.length === items.length && items.length > 0}
                                onChange={(e) => handleSelectAll(e.target.checked)}
                            />
                        <div className="flex flex-1 justify-between bg-neutral/10 rounded p-2 focus-within:border focus-within:border-primary">
                            <input
                                type="text"
                                className="flex-1 outline-none bg-transparent placeholder:text-neutral"
                                placeholder={t('Search')}
                                autoFocus={true}
                                value={search}
                                onChange={(e) => setSearch(e.target.value)}
                            />
                            <CiSearch className="m-1" />
                        </div>
                        <IoCloseOutline
                            className="cursor-pointer hover:text-danger text-xl hover:bg-neutral/10 rounded-full"
                            onClick={() => setSearch('')}
                        />
                    </div>

                    {items.filter(item => item.name.toLowerCase().includes(search.toLowerCase())).map((item) => {
                        const idStr = String(item.id);
                        const inputId = `${name}-${idStr}`;
                        return (
                            <label key={idStr} htmlFor={inputId} className="flex gap-2 p-2 hover:bg-primary/10">
                                <input
                                    id={inputId}
                                    type="checkbox"
                                    name={`${name}[]`}
                                    value={idStr}
                                    checked={selected.includes(idStr)}
                                    onChange={() => handleToggle(idStr)}
                                    className="border-border"
                                />
                                {item.name}
                            </label>
                        );
                    })}
                    <div className="flex justify-end gap-1">
                        <button
                            type="button"
                            onClick={() => setIsOpen(false)}
                            className="mt-2 p-2 bg-primary text-white rounded cursor-pointer hover:bg-primary/80 ">
                            <IoCloseOutline />
                        </button>
                        <button
                            type="button"
                            onClick={() => {
                                onChange([]);
                            }}
                            className="mt-2 p-2 bg-danger text-white rounded ml-2 cursor-pointer hover:bg-danger/80 ">
                            <VscClearAll />
                        </button>
                    </div>
                </div>
            )}
        </section>
    );
};

export default memo(MultiSelect)
