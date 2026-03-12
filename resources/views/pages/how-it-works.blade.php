@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">{{ __('messages.hiw_title') }}</h1>
        <p class="mt-4 text-xl text-gray-600 font-light">{{ __('messages.hiw_subtitle') }}</p>
    </div>

    <div class="space-y-16">
        <!-- Step 1 -->
        <section class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1">
                <div class="bg-blue-100 text-blue-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">1</div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4 tracking-tight">{{ __('messages.hiw_step1_title') }}</h2>
                <p class="text-slate-600 leading-relaxed">
                    {!! __('messages.hiw_step1_desc') !!}
                </p>
            </div>
            <div class="flex-1 bg-white p-8 rounded-2xl shadow-sm border border-blue-100">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">AD</div>
                        <div>
                            <p class="text-sm font-bold text-slate-900 leading-none">{{ __('messages.hiw_admin') }}</p>
                            <p class="text-[11px] text-slate-500">{{ __('messages.hiw_admin_desc') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold">GS</div>
                        <div>
                            <p class="text-sm font-bold text-slate-900 leading-none">{{ __('messages.hiw_manager') }}</p>
                            <p class="text-[11px] text-slate-500">{{ __('messages.hiw_manager_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Step 2 -->
        <section class="flex flex-col md:flex-row-reverse items-center gap-10">
            <div class="flex-1">
                <div class="bg-indigo-100 text-indigo-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">2</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 font-mono uppercase tracking-tight">{{ __('messages.hiw_step2_title') }}</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('messages.hiw_step2_desc') }}
                </p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-2xl shadow-xl border-l-4 border-indigo-500">
                <div class="h-4 bg-gray-100 rounded w-3/4 mb-2"></div>
                <div class="h-4 bg-gray-100 rounded w-1/2 mb-2"></div>
                <div class="h-8 bg-indigo-500 rounded w-1/3 mt-4"></div>
            </div>
        </section>

        <!-- Step 3 -->
        <section class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 border-t-2 border-gray-100 pt-8">
                <div class="bg-green-100 text-green-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">3</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 font-mono uppercase tracking-tight">{{ __('messages.hiw_step3_title') }}</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('messages.hiw_step3_desc') }}
                </p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-2xl shadow-xl border-l-4 border-green-500">
                <div class="flex justify-between items-center mb-4">
                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase">{{ __('messages.hiw_resolved') }}</span>
                    <span class="text-xs text-gray-400">{{ __('messages.hiw_time') }}</span>
                </div>
                <p class="text-sm font-semibold text-gray-800">{{ __('messages.hiw_msg') }}</p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="bg-gray-900 rounded-3xl p-8 md:p-12 text-white overflow-hidden relative">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-6 font-mono tracking-tighter">{{ __('messages.hiw_support_title') }}</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-400 mb-4">
                            {{ __('messages.hiw_support_desc') }}
                        </p>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> {{ __('messages.hiw_li1') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> {{ __('messages.hiw_li2') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> {{ __('messages.hiw_li3') }}</li>
                        </ul>
                    </div>
                    <div class="border-l border-gray-800 pl-8">
                        <p class="text-sm text-gray-500 uppercase font-bold tracking-widest mb-4">{{ __('messages.hiw_sla') }}</p>
                        <p class="text-2xl font-light">{!! __('messages.hiw_sla_desc') !!}</p>
                    </div>
                </div>
            </div>
            <!-- Decorative element -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-blue-600 rounded-full blur-3xl opacity-20"></div>
        </section>
    </div>
</div>
@endsection
