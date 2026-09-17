<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Structure - POLNEP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cyan: #19a9d0; --pale-cyan: #8bd3e6; --blue: #202bed; --ink: #07121d; --gray: #c8c8c8; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; color: var(--ink); font-family: Arial, sans-serif; background: white; }
        .org-page { min-height: 100vh; display: grid; grid-template-columns: 242px 1fr; grid-template-rows: 31px 1fr 180px; }
        .topbar { grid-column: 1 / -1; display: flex; align-items: center; justify-content: center; position: relative; background: #1ca7eb; }
        .search { width: 375px; height: 23px; display: flex; overflow: hidden; border: 1px solid #555; border-radius: 5px; background: #e8e8e8; box-shadow: 0 1px 2px #555; }
        .search input { width: 100%; border: 0; padding: 4px 8px; background: transparent; font-size: 9px; }
        .search button { width: 27px; border: 0; color: #075373; background: #bde5ec; cursor: pointer; }
        .languages { position: absolute; right: 10px; display: flex; gap: 3px; }
        .languages img { width: 23px; height: 15px; object-fit: cover; }
        .details { grid-row: 2 / 4; display: flex; flex-direction: column; padding: 24px 19px 18px; background: var(--pale-cyan); }
        .brand { width: 205px; margin-bottom: 18px; }
        .details h1 { max-width: 190px; margin: 0 0 20px; font-size: 23px; line-height: 1.1; }
        .details h2 { margin: 0 0 17px; font-size: 14px; }
        .details p { margin: 0; font-size: 11px; }
        .chart-area { position: relative; overflow: auto; padding: 12px 50px 30px; background: #fff; }
        .chart-heading { display: flex; justify-content: flex-end; min-height: 33px; }
        .chart-heading a { height: 22px; padding: 4px 10px; border-radius: 4px; color: white; background: var(--blue); font-size: 10px; text-decoration: none; }
        .chart { min-width: 650px; max-width: 850px; margin: 0 auto; padding-top: 5px; }
        .node { position: relative; width: 138px; min-height: 47px; display: flex; align-items: center; gap: 8px; padding: 8px 10px; border-radius: 11px; background: #1ba9d0; font-size: 9px; }
        .node.root { margin: 0 auto 54px; color: #fff; background: var(--blue); }
        .node.root::after { content: ''; position: absolute; left: 50%; top: 100%; width: 1px; height: 54px; background: #8d8dff; }
        .node img, .node-avatar { width: 25px; height: 25px; flex: 0 0 25px; display: grid; place-items: center; border-radius: 50%; color: white; background: #536a77; font-weight: 700; object-fit: cover; }
        .node-copy strong, .node-copy span { display: block; line-height: 1.1; }
        .node-copy strong { font-size: 9px; }
        .node-copy span { font-size: 8px; }
        .branches { position: relative; display: grid; grid-template-columns: repeat(2, 1fr); gap: 85px; }
        .branches::before { content: ''; position: absolute; top: -25px; left: 12%; right: 12%; border-top: 1px solid #8d8dff; }
        .branch { position: relative; display: flex; flex-direction: column; align-items: center; gap: 17px; }
        .branch::before { content: ''; position: absolute; top: -25px; left: 50%; height: 25px; border-left: 1px solid #8d8dff; }
        .branch > .node { background: #8bd3e6; }
        .branch > .node::after { content: ''; position: absolute; left: 50%; top: 100%; height: 17px; border-left: 1px solid #8d8dff; }
        .subnodes { width: 100%; display: flex; flex-direction: column; align-items: center; gap: 17px; }
        .subnodes .node::before { content: ''; position: absolute; left: 50%; bottom: 100%; height: 17px; border-left: 1px solid #8d8dff; }
        .node-actions { position: absolute; left: 100%; top: 3px; display: flex; gap: 3px; padding-left: 4px; }
        .node-actions form { display: inline; margin: 0; }
        .node-actions a, .node-actions button { border: 0; padding: 2px 4px; color: #172039; background: transparent; font-size: 9px; cursor: pointer; }
        .footer-info { grid-column: 1; display: flex; flex-direction: column; justify-content: center; padding: 10px 18px; background: var(--cyan); }
        .footer-info img { width: 185px; margin-bottom: 5px; }
        .footer-info p { max-width: 190px; margin: 0; font-size: 9px; line-height: 1.2; }
        .social-title { margin: 7px 0 5px; font-size: 8px; font-weight: 700; }
        .socials { display: flex; gap: 10px; }
        .socials a { width: 32px; height: 32px; display: grid; place-items: center; border-radius: 50%; color: white; text-decoration: none; }
        .socials a:nth-child(1) { background: #ddd; color: #333; }
        .socials a:nth-child(2) { background: #e63d45; }
        .socials a:nth-child(3) { background: #d918db; }
        .contact { grid-column: 2; padding: 30px 18px; background: var(--gray); color: white; }
        .contact h2 { margin: 0 0 12px; font-size: 9px; }
        .contact p { margin: 9px 0; font-size: 8px; }
        @media (max-width: 780px) {
            .org-page { grid-template-columns: 1fr; grid-template-rows: auto auto auto auto; }
            .topbar { min-height: 38px; }
            .search { width: 70%; }
            .details { grid-row: auto; min-height: 280px; }
            .chart-area { min-height: 700px; padding: 12px 20px 30px; }
            .footer-info, .contact { grid-column: auto; }
            .branches { gap: 35px; }
        }
    </style>
</head>
<body>
    <div class="org-page">
        <header class="topbar">
            <form class="search"><input type="search" placeholder="Search here..." aria-label="Search organization"><button type="submit" aria-label="Search"><i class="bi bi-search"></i></button></form>
            <div class="languages"><img src="{{ asset('images/id.png') }}" alt="Indonesian"><img src="{{ asset('images/us.png') }}" alt="English"></div>
        </header>

        <aside class="details">
            <a href="{{ route('dashboard') }}"><img class="brand" src="{{ asset('images/logo.png') }}" alt="POLNEP"></a>
            <h1>Polnep<br>Organizational<br>Chart</h1>
            <h2>Last Update</h2>
            <p>{{ now()->format('F Y') }}</p>
        </aside>

        <main class="chart-area">
            <div class="chart-heading">
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('organization.create') }}"><i class="bi bi-plus"></i> Add Member</a>
                @endif
            </div>
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            @if($members->isEmpty())
                <p class="text-center">No organization members have been added yet.</p>
            @else
                <div class="chart">
                    @foreach($members as $member)
                        <div class="node root">
                            @if($member->photo)<img src="{{ asset('storage/' . $member->photo) }}" alt="">@else<span class="node-avatar">{{ strtoupper(substr($member->name, 0, 1)) }}</span>@endif
                            <span class="node-copy"><strong>{{ $member->name }}</strong><span>{{ $member->position }}</span></span>
                            @if(auth()->user()->role === 'admin')
                                <span class="node-actions">
                                    <a href="{{ route('organization.edit', $member) }}" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('organization.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this member?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </span>
                            @endif
                        </div>
                        @if($member->children->isNotEmpty())
                            <div class="branches">
                                @foreach($member->children as $child)
                                    <div class="branch">
                                        <div class="node">
                                            @if($child->photo)<img src="{{ asset('storage/' . $child->photo) }}" alt="">@else<span class="node-avatar">{{ strtoupper(substr($child->name, 0, 1)) }}</span>@endif
                                            <span class="node-copy"><strong>{{ $child->name }}</strong><span>{{ $child->position }}</span></span>
                                            @if(auth()->user()->role === 'admin')
                                                <span class="node-actions">
                                                    <a href="{{ route('organization.edit', $child) }}" title="Edit"><i class="bi bi-pencil"></i></a>
                                                    <form action="{{ route('organization.destroy', $child) }}" method="POST" onsubmit="return confirm('Delete this member?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </span>
                                            @endif
                                        </div>
                                        @if($child->children->isNotEmpty())
                                            <div class="subnodes">
                                                @foreach($child->children as $grandchild)
                                                    <div class="node">
                                                        @if($grandchild->photo)<img src="{{ asset('storage/' . $grandchild->photo) }}" alt="">@else<span class="node-avatar">{{ strtoupper(substr($grandchild->name, 0, 1)) }}</span>@endif
                                                        <span class="node-copy"><strong>{{ $grandchild->name }}</strong><span>{{ $grandchild->position }}</span></span>
                                                        @if(auth()->user()->role === 'admin')
                                                            <span class="node-actions">
                                                                <a href="{{ route('organization.edit', $grandchild) }}" title="Edit"><i class="bi bi-pencil"></i></a>
                                                                <form action="{{ route('organization.destroy', $grandchild) }}" method="POST" onsubmit="return confirm('Delete this member?')">
                                                                    @csrf @method('DELETE')
                                                                    <button type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                                                                </form>
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </main>

        <section class="footer-info">
            <img src="{{ asset('images/logo.png') }}" alt="POLNEP">
            <p>Politeknik Negeri Pontianak is a vocational Freedom Campus initiative that makes the learning process in vocational higher education more free to produce graduates that meet industry needs.</p>
            <div class="social-title">FOLLOW US :</div>
            <div class="socials"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-youtube"></i></a><a href="#"><i class="bi bi-instagram"></i></a></div>
        </section>
        <section class="contact">
            <h2>CONTACT &amp; LOCATION :</h2>
            <p><i class="bi bi-geo-alt-fill"></i> &nbsp; Jl. Jenderal Ahmad Yani, Banjar Laut, Pontianak<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tenggara, Kota Pontianak, Kalimantan Barat 78124</p>
            <p><i class="bi bi-telephone-fill"></i> &nbsp; XXX-XXX-XXXX</p>
            <p><i class="bi bi-envelope-fill"></i> &nbsp; kampus@polnep.ac.id</p>
        </section>
    </div>
</body>
</html>
