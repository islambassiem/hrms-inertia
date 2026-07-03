import type { Links, Meta } from "@/types"
import { Link } from "@inertiajs/react";

const Pagination = ({ meta, links }: { meta: Meta, links?: Links }) => {
    return (
        <nav className="flex justify-center py-8">
            <div className="inline-flex items-center rounded-lg border border-gray-200 bg-white shadow-sm">
                {meta.links.map((link, index) =>
                    link.url ? (
                        <Link
                            key={link.label + "-" + (link.url ?? index)}
                            href={link.url}
                            preserveScroll
                            aria-current={link.active ? "page" : undefined}
                            className={`flex h-10 min-w-10 items-center justify-center border-r border-gray-200 px-3 text-sm font-medium transition-colors last:border-r-0 ${link.active
                                ? "bg-gray-900 text-white"
                                : "bg-white text-gray-700 hover:bg-gray-100"
                                }`}
                        >
                            <span
                                dangerouslySetInnerHTML={{
                                    __html: link.label,
                                }}
                            />
                        </Link>
                    ) : (
                        <span
                            key={index}
                            className="flex h-10 min-w-10 items-center justify-center border-r border-gray-200 px-3 text-sm text-gray-400 last:border-r-0"
                            dangerouslySetInnerHTML={{
                                __html: link.label,
                            }}
                        />
                    )
                )}
            </div>
        </nav>
    );
};


export default Pagination;
