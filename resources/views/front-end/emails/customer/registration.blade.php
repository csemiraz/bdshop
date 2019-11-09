@component('mail::message')

    <div class="container my-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center py-3">
                        <i data-feather="check-circle" class="text-success" width="48" height="48"></i>
                        <h1>Thank you. {{ $customer->first_name.' '.$customer->last_name }}</h1>
                        <p>Your registration has been successfully.</p>
                        <p class="mb-0">
                            <span class="text-muted">Your Name: {{ $customer->first_name.' '.$customer->last_name }}</span>
                        </p>
                        <p class="mb-0">
                            <span class="text-info">Your Email: {{ $customer->email }}</span>
                        </p>
  
                        <a href="http://localhost/PRACTICE/LARAVEL/bdshop/public/" class="btn btn-secondary rounded mb-3">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
            </div>
        </div>
         
@endcomponent
