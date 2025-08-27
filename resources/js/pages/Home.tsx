import App from "@/layouts/AppLayout";
import { usePage } from "@inertiajs/react";
import roles from "@/constants/auth";
import logo from "@/assets/images/logo.png";
import RoleCard from "@/components/Auth/RoleCard";
import { t } from "i18next";

const Home = () => {
    const { auth } = usePage().props;

    return (
        <App>
            <div className="flex flex-col items-center text-center mt-32">

                <div className="absolute top-40 -z-1 w-1/2 flex items-center justify-center opacity-5 ">
                    <img src={logo} alt="Logo watermark" />
                </div>

                <h1 className="text-3xl font-bold mb-10 text-text">
                    {t('Choose your account type')}
                </h1>

                <div className="w-full max-w-md space-y-6">
                    <RoleCard card={roles.employee} />
                    {auth?.data.roles.includes("head") && <RoleCard card={roles.head} />}
                    {auth?.data.roles.includes("hr") && <RoleCard card={roles.hr} />}
                </div>
            </div>
        </App>
    );
};

export default Home;
