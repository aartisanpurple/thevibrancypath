@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Blogs</h4>
                <a class="btn btn-primary" href="{{ route('admin.blog.create') }}">Add Blog</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </p>
                    <table id="datatable" class="table align-middle dt-responsive nowrap w-100 table-check dataTable no-footer dtr-inline">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Date Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10 Tips for Better Web Design</td>
                                <td>Web design is crucial for creating a user-friendly experience. Here are 10 tips...</td>
                                <td>John Doe</td>
                                <td>2025-02-25</td>
                            </tr>
                            <tr>
                                <td>How AI is Changing the Future of Work</td>
                                <td>The rise of AI is transforming industries. This article discusses the key changes...
                                </td>
                                <td>Jane Smith</td>
                                <td>2025-02-20</td>
                            </tr>
                            <tr>
                                <td>Top 5 Programming Languages to Learn in 2025</td>
                                <td>In 2025, the tech industry continues to evolve. Here are the top languages...</td>
                                <td>Emily Davis</td>
                                <td>2025-02-18</td>
                            </tr>
                            <tr>
                                <td>The Importance of Data Privacy in 2025</td>
                                <td>Data privacy concerns are increasing. This blog explores how to protect your data...
                                </td>
                                <td>Michael Lee</td>
                                <td>2025-02-15</td>
                            </tr>
                            <tr>
                                <td>Why Sustainability Should Be a Priority for Your Business</td>
                                <td>Sustainability is becoming increasingly important. Learn why it should be a priority...
                                </td>
                                <td>Sarah Wilson</td>
                                <td>2025-02-12</td>
                            </tr>
                            <tr>
                                <td>5 Essential Tools for Remote Teams</td>
                                <td>Remote teams need reliable tools to stay productive. Here are the best tools...</td>
                                <td>David Brown</td>
                                <td>2025-02-10</td>
                            </tr>
                            <tr>
                                <td>The Future of Electric Vehicles</td>
                                <td>Smart home technology is rapidly advancing. Here’s everything you need to know...</td>
                                <td>Amy Clark</td>
                                <td>2025-02-08</td>
                            </tr>
                            <tr>
                                <td>How to Improve Your SEO Ranking in 2025</td>
                                <td>SEO continues to evolve. Here are the top strategies to improve your website’s
                                    ranking...</td>
                                <td>Chris Martinez</td>
                                <td>2025-02-05</td>
                            </tr>
                            <tr>
                                <td>Understanding Blockchain Technology</td>
                                <td>Blockchain technology is revolutionizing industries. This blog breaks it down...</td>
                                <td>Olivia Johnson</td>
                                <td>2025-02-03</td>
                            </tr>
                            <tr>
                                <td>How to Create a Successful E-commerce Strategy</td>
                                <td>E-commerce is growing rapidly. Learn the strategies that can help your business
                                    succeed...</td>
                                <td>James Taylor</td>
                                <td>2025-01-30</td>
                            </tr>
                            <tr>
                                <td>The Rise of Smart Homes</td>
                                <td>Smart home technology is on the rise. Here's how the industry is evolving...</td>
                                <td>Lucas Harris</td>
                                <td>2025-01-28</td>
                            </tr>
                            <tr>
                                <td>Why Digital Marketing is Key to Success in 2025</td>
                                <td>Digital marketing is essential for modern businesses. Learn how to leverage it...</td>
                                <td>Grace Miller</td>
                                <td>2025-01-25</td>
                            </tr>
                            <tr>
                                <td>How to Build an Engaged Online Community</td>
                                <td>Building an engaged online community can help boost brand loyalty. Here’s how...</td>
                                <td>John White</td>
                                <td>2025-01-22</td>
                            </tr>
                            <tr>
                                <td>What’s Next for Social Media Marketing?</td>
                                <td>Social media is evolving rapidly. Find out what trends will dominate in 2025...</td>
                                <td>Laura Green</td>
                                <td>2025-01-20</td>
                            </tr>
                            <tr>
                                <td>The Essential Guide to Cybersecurity in 2025</td>
                                <td>With cybersecurity risks growing, here are essential steps to protect your business...
                                </td>
                                <td>Steven Walker</td>
                                <td>2025-01-18</td>
                            </tr>
                        </tbody>
                    </table>




                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
