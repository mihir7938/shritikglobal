@extends('layouts.site-app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
         data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">
                About Us
            </h1>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Company Introduction Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-about-image">
                        <img src="{{ asset('img/about.jpg') }}"
                             alt="Shritik Global India Private Limited"
                             class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-about-content">
                        <span class="sg-about-label">WHO WE ARE</span>
                        <h2>Creating Financial Pathways for Individuals and Businesses</h2>
                        <p>
                            Shritik Global India Private Limited is built around a simple
                            understanding: financial requirements change with people,
                            professions and businesses. A first-time borrower, a salaried
                            professional, a self-employed individual, a growing MSME and
                            a large enterprise may all need financing—but each requires a
                            different conversation, different information and a different
                            approach.
                        </p>
                        <p>
                            Our focus is to help customers explore secured and unsecured
                            financing options across retail, business and enterprise
                            categories. We aim to make the process more organised by
                            understanding the requirement, discussing relevant possibilities
                            and coordinating with appropriate financial institutions or
                            funding partners where applicable.
                        </p>
                        <p>
                            We believe that a responsible financing journey begins with
                            clarity. Customers should understand the nature of the facility,
                            the documents involved, the role of the lender, associated costs
                            and repayment responsibilities before proceeding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Company Introduction End -->
    <!-- Vision & Mission Start -->
    <div class="container-xxl sg-about-purpose py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-purpose-card h-100">
                        <div class="sg-purpose-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>
                            To build a trusted financial-solutions ecosystem that helps
                            individuals and enterprises across India explore appropriate
                            financing opportunities and move forward with greater clarity.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-purpose-card h-100">
                        <div class="sg-purpose-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>
                            To simplify the financing journey through requirement-led
                            guidance, professional coordination, transparent communication
                            and responsible relationships with customers and financial
                            partners.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision & Mission End -->
    <!-- Our Philosophy Start -->
    <div class="container-xxl sg-philosophy py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <span class="sg-about-label">OUR APPROACH</span>
                    <h2 class="display-6 mb-4">
                        Our Philosophy
                    </h2>
                    <p>
                        Every financial requirement deserves to be understood before
                        a solution is discussed. We do not believe in a one-size-fits-all
                        approach. The right route depends on the customer's purpose,
                        profile, financial position, security available, repayment
                        capacity and the criteria of the relevant lender.
                    </p>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-philosophy-points">
                        <div class="sg-philosophy-point">
                            <i class="fas fa-comments"></i>
                            <div>
                                <h5>Understand the Requirement</h5>
                                <p>
                                    Begin with the customer's purpose, financial needs
                                    and individual circumstances.
                                </p>
                            </div>
                        </div>
                        <div class="sg-philosophy-point">
                            <i class="fas fa-search"></i>
                            <div>
                                <h5>Explore Relevant Possibilities</h5>
                                <p>
                                    Consider suitable financing routes based on the
                                    available information and lender criteria.
                                </p>
                            </div>
                        </div>
                        <div class="sg-philosophy-point">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h5>Maintain Clarity</h5>
                                <p>
                                    Help customers understand documentation, lender
                                    requirements and the next steps.
                                </p>
                            </div>
                        </div>
                        <div class="sg-philosophy-point">
                            <i class="fas fa-handshake"></i>
                            <div>
                                <h5>Build Responsible Relationships</h5>
                                <p>
                                    Value transparent communication, professional
                                    conduct and long-term relationships.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Philosophy End -->
    <!-- Our Values Start -->
    <div class="container-xxl sg-about-values py-5">
        <div class="container">
            <div class="sg-section-heading text-center mx-auto mb-5">
                <span class="sg-about-label">WHAT GUIDES US</span>
                <h2>Our Values</h2>
                <p>
                    The principles that guide our decisions, customer interactions
                    and professional relationships.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Integrity</h5>
                        <p>
                            Be honest about what the company can and cannot do;
                            never misrepresent a product or approval possibility.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h5>Transparency</h5>
                        <p>
                            Explain process, documentation, fees, lender role
                            and limitations clearly.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h5>Customer Respect</h5>
                        <p>
                            Listen carefully and treat every enquiry with
                            professionalism and dignity.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h5>Ownership</h5>
                        <p>
                            Take responsibility for agreed communication
                            and follow-up.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h5>Confidentiality</h5>
                        <p>
                            Handle personal and business information carefully
                            and only for legitimate purposes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5>Excellence</h5>
                        <p>
                            Use disciplined processes, accurate information
                            and continuous improvement.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-value-item h-100">
                        <div class="sg-value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h5>Partnership</h5>
                        <p>
                            Build professional relationships based on clear
                            roles and mutual accountability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Values End -->
    <!-- Founder & Chairman Start -->
    <div class="container-xxl sg-founder-section py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-founder-image">
                        <img src="{{ asset('img/about.jpg') }}" alt="Hemant Shrivastav - Founder and Chairman" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <span class="sg-about-label">FOUNDER & CHAIRMAN</span>
                    <h2 class="display-6 mb-3">
                        Leadership Guided by Purpose. Growth Built on Relationships.
                    </h2>
                    <h4 class="sg-founder-name">
                        Hemant Shrivastav
                    </h4>
                    <span class="sg-founder-designation">
                        Founder & Chairman
                    </span>
                    <p class="mt-4">
                        Hemant Shrivastav is the Founder & Chairman of Shritik
                        Global India Private Limited. He provides the company's
                        long-term direction, shapes its strategic priorities
                        and guides the development of its financial-solutions
                        ecosystem.
                    </p>
                    <p>
                        With experience in banking and financial institutions
                        and a strong interest in financing and capital, Hemant
                        believes that access to appropriate financial solutions
                        can support personal aspirations, business continuity
                        and enterprise growth.
                    </p>
                    <p>
                        The vision behind Shritik Global is to create a
                        professional platform that understands financial
                        requirements across customer segments—from retail
                        borrowers and self-employed professionals to MSMEs,
                        established businesses and enterprises. The company
                        seeks to bring greater structure to the financing
                        journey through responsible guidance, relevant
                        partnerships and transparent communication.
                    </p>
                    <p class="mb-0">
                        As Founder & Chairman, Hemant focuses on strategic
                        direction, governance, organisational culture, key
                        relationships and long-term development.
                    </p>
                </div>
            </div>
            <!-- Founder's Message -->
            <div class="sg-founder-message mt-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sg-founder-quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <div>
                    <span class="sg-about-label">A MESSAGE FROM OUR FOUNDER</span>
                    <h3>Building Trust Through Responsible Financial Guidance</h3>
                    <p>
                        “At Shritik Global, we believe that every financial
                        requirement begins with a real goal—whether it is a
                        family's aspiration, a professional's next step,
                        an entrepreneur's ambition or an enterprise's growth plan.
                    </p>
                    <p>
                        Our responsibility is to listen carefully, communicate
                        honestly and help customers understand the financial
                        routes that may be relevant to their needs. We want
                        to build an organisation that values trust, disciplined
                        execution and long-term relationships.
                    </p>
                    <p>
                        Our journey is guided by the belief that responsible
                        financial access can create meaningful possibilities.
                        We look forward to building this journey with our
                        customers, team members and financial partners.”
                    </p>
                    <h6 class="mb-0">
                        — Hemant Shrivastav
                        <span>| Founder & Chairman</span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Founder & Chairman End -->
    <!-- Team Structure Start -->
    <div class="container-xxl sg-leadership-section py-5">
        <div class="container">
            <div class="sg-section-heading text-center mx-auto mb-4">
                <span class="sg-about-label">OUR PEOPLE</span>
                <h2>
                    A Team Focused on Clarity, Coordination and Customer Progress
                </h2>
                <p>
                    Shritik Global's operating model is designed to combine
                    strategic leadership with clear functional ownership.
                    The Founder & Chairman provides strategic direction, while
                    the operating CEO is responsible for translating the
                    company's priorities into execution, performance and
                    customer experience.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">01</div>
                        <h5>Founder & Chairman</h5>
                        <p>
                            Long-term vision, strategy, governance,
                            key relationships and culture.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">02</div>
                        <h5>Chief Executive Officer / Operating CEO</h5>
                        <p>
                            Day-to-day leadership, business execution,
                            team performance, operating discipline
                            and customer outcomes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">03</div>
                        <h5>Head – Capital & Financial Partnerships</h5>
                        <p>
                            Develop and manage relationships with banks,
                            NBFCs and other eligible financial partners.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">04</div>
                        <h5>Head – Business Development</h5>
                        <p>
                            Lead customer acquisition, channel development,
                            sales standards and business growth.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">05</div>
                        <h5>Credit & Transaction Manager</h5>
                        <p>
                            Coordinate requirement assessment, information
                            completeness and transaction documentation
                            within permitted role.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sg-leadership-card h-100">
                        <div class="sg-leadership-number">06</div>
                        <h5>Operations & CRM Executive</h5>
                        <p>
                            Manage lead allocation, records, follow-ups,
                            service coordination and MIS.
                        </p>
                    </div>
                </div>
            </div>
            <div class="sg-team-note mt-5">
                <i class="fas fa-users"></i>
                <div>
                    <p>
                        Behind every customer interaction is a coordinated
                        team. Our people work across customer engagement,
                        business development, partner coordination,
                        documentation support and operations. Each function
                        contributes to a more organised financing journey.
                    </p>
                    <p class="mb-0">
                        We value professional conduct, accuracy,
                        confidentiality, accountability and continuous
                        learning. As the organisation grows, we aim to
                        strengthen specialist capabilities and develop
                        a culture where customer needs and responsible
                        processes remain central.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Structure End -->
    <!-- Our Commitment Start -->
    <div class="container-xxl sg-commitment-section py-5">
        <div class="container">
            <div class="sg-commitment-box text-center">
                <span class="sg-about-label">OUR COMMITMENT</span>
                <h2>Our Commitment</h2>
                <p>
                    We aim to make every interaction clear, respectful and
                    purposeful. We will communicate the next step, avoid
                    unrealistic assurances and encourage customers to review
                    the lender's offer and repayment obligations carefully.
                </p>
            </div>
        </div>
    </div>
    <!-- Our Commitment End -->
@endsection
