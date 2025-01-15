<div id="underscore-templates">

<script type="text/template" id="template-card">
<li tabindex="0" id="<%= post_slug %>" data-name="<%= post_slug %>" data-img="<%= img_highres %>" class="flip-container grid-item <%= classes %>">
	<div class="flipper" role="button" aria-expanded="false">
		<div class="front lazy" data-src="<%= img %>">
		</div>
		<div class="back">
			<p class="back-title"><%= post_title %></p>
			<p class="major"><%= major %></p>
		</div>
		<div tabindex="0" class="full-bio" aria-hidden="true">
			<h2><%= post_title %>
			<% if (  linkedin )  { %>
				<a target="_blank" class="linkedin" href="<%= linkedin %>">LinkedIn</a>
			<% } %>
			</h2>
			<div class="bio-info">
				<p><%= hometown %></p>
				<p><%= major %></p>
				<p><%= minor %></p>
				<p class="year-awarded">Year awarded <%= year_awarded %></p>
			</div>
			<div class="bio-text">
				<p><%= content %></p>
			</div>
			<div class="tags">
				<%= tags %>
			</div>
		</div>
	</div>
</li>
</script>

</div>