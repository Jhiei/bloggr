<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Bloggr') }} | {{ $this_blog->blog_title }}</title>

    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pages/blog/create.css') }}">
    <link rel="icon" href="{{ asset('images/fav.png') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <main class="main-body">
        <div class="sidebar-tools">
            <div class="sidebar-tools-container">
                <div class="tool heading">
                    <div class="tool-icon">
                        <ion-icon name="text-outline"></ion-icon>
                    </div>
                    <h3 class="tool-heading">Heading</h3>
                </div>
                <div class="tool paragraph">
                    <div class="tool-icon">
                        <ion-icon name="text-outline"></ion-icon>
                    </div>
                    <h3 class="tool-heading">Paragraph</h3>
                </div>
                <div class="tool link">
                    <div class="tool-icon">
                        <ion-icon name="text-outline"></ion-icon>
                    </div>
                    <h3 class="tool-heading">Hyperlink</h3>
                </div>
            </div>
        </div>

        <div class="content"></div>

        <div class="sidebar-details">
            <div class="sidebar-details-blog">
                <div class="sidebar-details-blog-container">
                    <form action="{{ route('blog-update') }}" method="POST" enctype="multipart/form-data" class="details-blog-form">
                        @csrf
                        <div class="details-blog-form-input-field img-input-field">
                        <label class="details-blog-form-label">Thumbnail</label>
                            <label for="blog-tnail" class="image-input">
                                <div class="image-input-container">
                                    <img id="thumbnail" src="{{ asset('storage/thumbnail/' . $this_blog->blog_tnail_path) }}" alt="prompt user to enter thumbnail">
                                </div>
                            </label>
                            <input type="file" name="blog_tnail" id="blog-tnail" accept="image/*" onchange="loadFile(event)" required>
                        </div>
                        <div class="details-blog-form-input-field">
                            <label class="details-blog-form-label" for="blog-title">Title</label>
                            <input type="text" id="blog-title" name="blog_title" class="details-blog-form-input" value="{{ $this_blog->blog_title }}">
                        </div>
                        <div class="details-blog-form-input-field">
                            <label class="details-blog-form-label" for="blog-desc">Description</label>
                            <textarea id="blog-desc" name="blog_desc" class="details-blog-form-text">{{ $this_blog->blog_desc }}</textarea>
                        </div>
                        <div class="details-blog-form-input-field">
                            <label class="details-blog-form-label" for="blog-tags">Tags</label>
                            <div class="details-blog-form-add-tag">
                                <input type="text" id="blog-tags" class="details-blog-form-input add-tag-input" placeholder="Add tag...">
                                <div class="blog-tags-icon">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                            </div>
                            <span class="blog-tags-note">You may add up to 4 tags.</span>
                        </div>
                        <input type="hidden" name="blog_id" value="{{ $this_blog->id }}">
                        <input type="hidden" name="blog_html" id="blog-html" class="content-body">                    
                    </form>
                </div>
            </div>

            <div class="sidebar-details-submit">
                <button class="drafts-btn" type="button">Draft</button>
                <button class="submit-btn" type="submit">Publish</button>
            </div>
        </div>
    </main>
    
    <script src="{{ asset('js/blog/add-element.js') }}"></script>
    <script src="{{ asset('js/feed/display-on-upload.js') }}"></script>
    <script src="{{ asset('js/blog/open-sidebar-tool.js') }}"></script>
    <script src="{{ asset('js/blog/submit.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
