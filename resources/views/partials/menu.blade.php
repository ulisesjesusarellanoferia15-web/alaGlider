<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
              <div class="container-xxl d-flex h-100 justify-content-center align-items-center">
                <ul class="menu-inner">
                    @foreach($categories as $category)
                        <li class="menu-item">
                        <a href="{{ route('categories.show', $category->slug) }}" class="menu-link">
                            {{ $category->name }}
                        </a>
                        </li>
                    @endforeach
                </ul>
              </div>
            </aside>