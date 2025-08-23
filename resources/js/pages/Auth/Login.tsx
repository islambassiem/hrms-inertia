import AppLayout from "@/layouts/AppLayout"
import { t } from "i18next"
import logo from '@/assets/images/image.png'
import FloatingLable from "@/components/ui/FloatingLablel"

import { FcGoogle } from "react-icons/fc";
import { Form } from "@inertiajs/react";
import Button from "@/components/ui/Button";
import { VscSignIn } from "react-icons/vsc";


const Login = () => {
    return (
        <AppLayout>
            <section className="flex flex-col justify-center items-center max-w-sm mx-auto bg-surface p-10 shadow-xl">
                <img src={logo} alt="logo" className="size-32 mb-10" />
                <h1 className="text-2xl mb-6">{t('Login')}</h1>
                <Form className="w-full flex flex-col gap-3 mb-6">
                    <FloatingLable id="empid" placeholder={t('Employee ID')} />
                    <FloatingLable id="password" placeholder={t('Password')} type="password" />
                    <Button type="submit" className="w-full mt-6" variant='primary'>
                        <VscSignIn className="rtl:rotate-180 text-bg"/>
                        <span className="text-bg">{t('Login')}</span>
                    </Button>
                </Form>
                <a href="" className="flex justify-center items-center gap-2 bg-neutral/10 hover:bg-neutral/30 shadow-xl rounded-lg font-sm w-full p-4">
                    <FcGoogle className="text-2xl " />
                    <span>{t('Login with Google')}</span>
                </a>
            </section>
        </AppLayout>
    )
}

export default Login
