@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('components.hero')

    <!-- Marquee Ticker -->
    @include('components.ticker')

    <!-- Services Capabilities -->
    @include('components.services')

    <!-- Case Studies & Portfolio Projects -->
    @include('components.projects')

    <!-- Core Engineering Team & Architects -->
    @include('components.team')

    <!-- Tech Stack Matrix -->
    @include('components.tech-matrix')

    <!-- About DevTZ & Engineering Metrics -->
    @include('components.about')

    <!-- Interactive Cost Estimator Widget -->
    @include('components.cost-estimator')

    <!-- Client Testimonials -->
    @include('components.testimonials')

    <!-- Blog & Engineering Insights -->
    @include('components.blog')

    <!-- Contact & Architecture Inquiry -->
    @include('components.contact')

    <!-- Interactive Modals -->
    @include('components.project-modal')
    @include('components.article-modal')
@endsection
